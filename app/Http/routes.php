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

Route::pattern('id', '[1-9][0-9]*');

Route::get('/', ['as' => 'Home', 'uses' => 'FrontController@index']);
Route::get('/article/{id}', ['as' => 'Article', 'uses' => 'FrontController@show']);
Route::get('/user/{id}', ['as' => 'ArticleUser', 'uses' => 'FrontController@showPostByUser']);
Route::get('/category/{id}', ['as' => 'ArticleCategory', 'uses' => 'FrontController@showPostByCat']);
Route::get('/published/{post}', ['as' => 'Publication', 'uses' => 'PostController@published']);
Route::get('/post', ['as' => 'Dashboard', 'uses' => 'PostController@index']);

Route::group(['middleware' => 'web'], function(){
	Route::auth();
	Route::group(['middleware' => 'auth'], function(){
		Route::resource('post', 'PostController');
	});
});