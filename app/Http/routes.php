<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
use Illuminate\Routing\Router;
//博客查看页
    Route::get('/',function(){
        return redirect('blog');
        //return view('admin.post.index');
    });
    Route::resource('blog','BlogController',['except'=>'show']);
    //Route::get('blog','BlogController@index');
    Route::get('blog/{slug}','BlogController@showPost');

    //管理员
    Route::group(['middleware' => 'auth'],function() {
    Route::get('/admin', function () {
        return redirect('/admin/post');
        //return view('admin.post.index');
        });
    });

    Route::group(['middleware' => 'web'],function(){
        Route::resource('/admin/post','Admin\PostController', ['except' => 'show']);
        Route::resource('/admin/discuss','Admin\DiscussController', ['except' => 'show']);
        Route::resource('/admin/answer','Admin\AnswerController', ['except' => 'show']);
        Route::get('/admin/discuss/{slug}','Admin\DiscussController@showDiscuss');
        Route::get('/admin/answer/edit','Admin\AnswerController@edit');

//        Route::resource('/admin/tag','TagController');
//        Route::get('/admin/upload','UploadController@index');


        Route::auth();
    });

//登录、退出

//Route::get('logout', 'Auth\AuthController@logout');
    /*Route::get('auth/login','Auth\AuthController@getLogin');
    Route::get('auth/login','Auth\AuthController@postLogin');
    Route::get('auth/logout','Auth\AuthController@postLogout');*/
        /*//博客查看页
        Route::get('/',function(){
            return view('admin.post.index');
        });

        Route::get('blog','BlogController@index');
        Route::get('blog/{slug}','BlogController@showPost');

        //管理员

        Route::group(['namespace' => 'Admin', 'middleware' => 'auth'],function(){
            Route::get('/admin', 'PostController@index');
            Route::resource('/admin/post','PostController');
            Route::resource('/admin/tag','TagController');
            Route::get('/admin/upload','UploadController@index');
        });*/


//联系人管理
/*Route::group(['middleware' => 'auth'], function(){
  Route::get('/', function () {
        return redirect('welcome');
    });
});

Route::group(['middleware' => ['web']], function () {

    // Route::get('/', function () {
    //     return view('welcome');
    // })->middleware('guest');

    Route::get('/tasks', 'TaskController@index');
    Route::post('/task', 'TaskController@store');
    Route::delete('/task/{task}', 'TaskController@destroy');

    Route::auth();

});*/
