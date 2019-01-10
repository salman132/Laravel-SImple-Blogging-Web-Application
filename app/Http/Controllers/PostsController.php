<?php

namespace App\Http\Controllers;

use Session;
use App\Posts;
use App\Tag;
use Auth;

use App\Category;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts',Posts::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if($categories->count()==0){

            Session::flash('info','Please Create a Category For Post');
            return redirect()->route('category.create');
        }
        $tag = Tag::all();
        if($tag->count()==0){
            Session::flash('info','Please Create a Tag For Your Post');
            return redirect()->route('create.tag');
        }


        return view('admin.posts.create')->with('categories',Category::all())->with('tags',Tag::all());
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'title' => 'required|max:255',
            'featured'=> 'required|image',
            'mcontent'=>'required',
            'category'=> 'required|max:120',
            'tag' => 'required'

        ]);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$featured_new_name);

        $post = new Posts;
        $post->title = $request->title;
        $post->featured = 'uploads/posts/' . $featured_new_name;
        $post->content = $request->mcontent;
        $post->category_id = $request->category;
        $post->slug = str_slug($request->title);
        $post->user_id = Auth::id();

        $post->save();

        $post ->tags()->attach($request->tag);




        Session::flash('success',"Post saved");
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::find($id);

        return view('admin.posts.edit')->with('post',$post)->with('categories',Category::all())
            ->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=> 'required| max:255',
            'mcontent'=> 'required',
            'category' => 'required'
        ]);


        $post = Posts::find($id);


        if($request->hasFile('featured')){

            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts',$featured_new_name);

            $post->featured = 'uploads/posts/' .$featured_new_name;
        }



        $post->title = $request->title;

        $post->category_id= $request->category;
        $post->content = $request->mcontent;
        $post->slug = str_slug($request->title);

        $post->user_id = Auth::id();

        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('success','You successfully updated the post');

        return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::find($id);
        $post->delete();
        Session::flash('success','You Trashed a Post successfully');
        return redirect()->back();
    }

    public function trashed(){
        $post = Posts::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts',$post);
    }
    public function kill($id){

        $post= Posts::withTrashed()->where('id',$id)->first();

        $post->forceDelete();

        Session::flash('success','Your Posts Deleted Permanently');
        return redirect()->back();

    }
    public function restore($id){
        $post = Posts::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flash('success','You Successfully restored post');

        return redirect()->back();
    }
}
