<?php

namespace App\Http\Controllers;

use App\Category;
use App\Posts;
use App\Profile;
use App\Setting;
use App\Tag;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome')
            ->with('SiteTitle',Setting::first()->site_name)
            ->with('categories',Category::take(6)->get())
            ->with('first_post',Posts::orderBy('created_at','desc')->first())
            ->with('second_post',Posts::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
            ->with('third_post',Posts::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
            ->with('lorem',Category::find(1))
            ->with('science',Category::find(2));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function  single($slug){
        $post = Posts::where('slug',$slug)->first();

        $next_id = Posts::where('id', '>',$post->id)->min('id');
        $prev_id = Posts::where('id','<',$post->id)->max('id');

        return view('single')
            ->with('SiteTitle',Setting::first()->site_name)
            ->with('post',$post)
            ->with('title',$post->title)
            ->with('categories',Category::take(5)->get())
            ->with('next',Posts::find($next_id))
            ->with('prev',Posts::find($prev_id))
            ->with('tags',Tag::all());

    }

    public function category($id){
        $category = Category::find($id);

        return view('category')
            ->with('SiteTitle',Setting::first()->site_name)
            ->with('category',$category)
            ->with('title',$category->name)
            ->with('settings',Setting::first())
            ->with('categories',Category::take(5)->get())
            ->with('tags',Tag::all());
    }

    public function tag($id){
        $tag = Tag::find($id);

        return view('tag')
            ->with('tag',$tag)
            ->with('SiteTitle',Setting::first()->site_name)
            ->with('categories',Category::take(5)->get());
    }
}
