<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


Route::auth();

Route::get('/', 'HomeController@index');

Route::get('login', function(){
    return view('auth.login');
});

Route::get('/post/{id}',['as'=>'home.post','uses'=>'AdminPostsController@post']);


Route::group(['middleware'=>'admin'],function(){
    Route::get('/admin', function () {
        return view('admin.index');
    });
    Route::resource('/admin/users', 'AdminUsersController');
    Route::resource('/admin/posts', 'AdminPostsController');
    ROute::resource('/admin/categories','AdminCategoriesController');
    ROute::resource('/admin/comments','PostCommentsController');
    ROute::resource('/admin/comment/replies','CommentRepliesController');
});

Route::group(['middleware'=>'auth'],function(){
   Route::post('comment/reply','CommentRepliesController@createReply') ;
});

