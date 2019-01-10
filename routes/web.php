<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/test',function(){
    return App\Category::find(11)->posts;

});

Route::get('/',[
    'uses'=>'FrontendController@index',
    'as'=> 'front'
]);
Route::get('post/{slug}',[
    'uses'=>'FrontendController@single',
    'as'=> 'post.single'
]);
Route::get('/category/{id}',[
    'uses'=> 'FrontendController@category',
    'as'=> 'category.single'
]);
Route::get('/tag/{id}',[
    'uses'=> 'FrontendController@tag',
    'as'=> 'tag.single'
]);
Route::get('/results',function(){
    $posts = \App\Posts::where('title','like', '%' .request('query') . '%')->get();

    return view('results')
        ->with('posts',$posts)
        ->with('SiteTitle','Search results: ' .request('query'))
        ->with('settings',\App\Setting::first())
        ->with('categories',\App\Category::take(5)->get())
        ->with('query',request('query'));

});

Auth::routes();

Route::get('admin/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=> 'auth'], function(){

    Route::get('/post/create',[
        'uses'=> 'PostsController@create',
        'as'=>'post.create'
    ]);
    Route::post('/post/store',[
        'uses'=> 'PostsController@store',
        'as'=> 'post.store'

    ]);
    Route::get('category/create',[
        'uses' => 'CategoryController@create',
        'as' => 'category.create'
    ]);
    Route::post('/category/store',[
        'uses'=> 'CategoryController@store',
        'as' => 'category.store'
    ]);
    Route::get('categories',[
        'uses'=> 'CategoryController@index',
        'as'=> 'categories'
    ]);
    Route::get('category/delete/{id}',[
        'uses'=> 'CategoryController@destroy',
        'as' => 'category.delete'
    ]);
    Route::get('category/edit/{id}',[
        'uses'=> 'CategoryController@edit',
        'as' => 'category.edit'
    ]);
    Route::post('category/update/{id}',[
        'uses'=> 'CategoryController@update',
        'as' => 'category.update'
    ]);
    Route::get('show/post',[
        'uses'=> 'PostsController@index',
        'as'=> 'show.post'
    ]);
    Route::get('post/delete/{id}',[
        'uses'=> 'PostsController@destroy',
        'as' => 'post.delete'
    ]);
    Route::get('posts/trashed',[
        'uses'=> 'PostsController@trashed',
        'as'=> 'post.trashed'
    ]);
    Route::get('posts/kill/{id}',[
        'uses'=> 'PostsController@kill',
        'as'=> 'post.kill'
    ]);
    Route::get('post/restore/{id}',[
        'uses' => 'PostsController@restore',
        'as' => 'post.restore'
    ]);

    Route::get('post/edit/{id}',[
        'uses'=> 'PostsController@edit',
        'as'=> 'edit.post'
    ]);
    Route::post('post/update/{id}',[
        'uses'=> 'PostsController@update',
        'as'=> 'post.update'
    ]);

    Route::get('create/tag',[
        'uses'=> 'TagsController@create',
        'as'=> 'create.tag'
    ]);
    Route::get('show/tag',[
        'uses'=> 'TagsController@index',
        'as'=> 'show.tag'
    ]);

   Route::post('tag/store',[
       'uses'=>'TagsController@store',
       'as'=> 'tag.store'
   ]);
   Route::get('tag/delete/{id}',[
       'uses' => 'TagsController@destroy',
       'as'=> 'tag.delete'
   ]);
   Route::get('tag/edit/{id}',[
       'uses'=> 'TagsController@edit',
       'as'=> 'tag.edit'
   ]);

   Route::post('tag/update/{id}',[
       'uses'=> 'TagsController@update',
       'as'=> 'tag.update'
   ]);
   Route::get('/users',[
       'uses'=> 'UsersController@index',
       'as' => 'users'
   ]);
   Route::get('/user/create',[
       'uses'=> 'UsersController@create',
       'as'=> 'user.create'
   ]);
   Route::post('user/store',[
       'uses'=> 'UsersController@store',
       'as' => 'user.store'
   ]);
   Route::get('make/admin/{id}',[
       'uses'=> 'UsersController@admin',
       'as'=> 'make.admin'
   ])->middleware('admin');

   Route::get('remove/admin/{id}',[
       'uses'=> 'UsersController@remove',
       'as'=> 'remove.admin'
   ])->middleware('admin');



  Route::get('user/profile',[
      'uses'=> 'ProfileController@index',
      'as'=> 'user.profile'
  ]);
  Route::post('user/profile/update/',[
      'uses'=> 'ProfileController@update',
      'as'=> 'user.profile.update'
  ]);

Route::get('change/settings',[
    'uses'=> 'SettingsController@index',
    'as'=> 'settings'
]);
Route::post('settings/update/{id}',[
    'uses'=> 'SettingsController@update',
    'as'=> 'setting.update'
]);





});




Route::group(['prefix'=>'wp-admin','middleware'=>'auth'],function(){
    Route::get('login',function(){
        return "Hi";
    })->middleware('admin');
});




