<?php


use Illuminate\Support\Facades\Route;

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
//Default Routes//
Auth::routes();

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]] , function()
{
    //Home Routes//
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/test', 'PostController@test');

        Route::get('/', 'HomeController@redirectHome');
        Route::get('/home', 'HomeController@home')->name('home.page');
    });

    Route::group(['namespace' => 'Auth'], function () {
        Route::get('login' , 'LoginController@showLoginForm')->name('user.login');
        Route::post('login' , 'LoginController@login')->name('user.login');
        Route::get('register' , 'RegisterController@showRegistrationForm')->name('user.register');
        Route::get('logout' , 'LoginController@logout')->name('user.logout');

    });

    //Posts Routes//
    Route::group(['namespace' => 'Main' , 'prefix' => 'posts' , 'middleware' => 'auth'], function ()
    {
        Route::get('/', 'PostController@index')->name('posts.index');
        Route::post('/store', 'PostController@store')->name('post.store');
        Route::post('/delete', 'PostController@delete')->name('post.delete');
        Route::get('/delete/{id}', 'PostController@deleteNotAjax')->name('post.delete.not.ajax');
        Route::post('/deleteAll', 'PostController@deleteAll')->name('post.delete.all');
        Route::get('/edit/{id}', 'PostController@edit')->name('post.edit');
        Route::post('/update/{id}', 'PostController@update')->name('post.update');

        Route::get('/{id}', 'PostController@showFullPost')->name('full.post');
        Route::post('/comment-store', 'CommentController@store')->name('comment.store');
        Route::post('/comment-delete', 'CommentController@delete')->name('comment.delete');
        Route::post('/comment-like', 'CommentController@like')->name('comment.like');
        Route::post('/comment-disliske', 'CommentController@dislike')->name('comment.dislike');


    });

});

