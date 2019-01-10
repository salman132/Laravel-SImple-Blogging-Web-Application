<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Session;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'name'=> 'required',
            'email'=> 'required|email',
            'password'=> 'required'

        ]);
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $profile = new Profile;

        $profile->user_id = $user->id;
        $profile->avatar = 'uploads/avatar/1533838397laravel-56-is-released-5a8c604e2b02a.png';
        $profile->about = 'Fucking user';
        $profile->facebook = 'wwww.facebbok.com/me';
        $profile->youtube = 'www.youtube.com';
        $profile->save();

        Session::flash('success','You Added User');
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
    public function admin($id){
       $user = User::find($id);
       $user->admin = 1;
       $user->save();

       Session::flash('success','You successfully made an admin');
       return redirect()->back();
    }

    public function remove($id){
        $user = User::find($id);

        $user->admin = 0;
        $user->save();
        Session::flash('success','You changed the permission');
        return redirect()->back();
    }
}
