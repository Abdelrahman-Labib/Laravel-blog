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

// Route::get('/',function(){
//     return view('blog/home');
// });

Route::get('/', 'PostController@publicHome')->name('getPublic');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts','PostController');

Route::post('comments/{id}','CommentController@showComment')->name('getComment');
