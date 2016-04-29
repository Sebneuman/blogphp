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


Route::get('/post', ['as' => 'Dashboard', 'uses' => 'PostController@index']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);

Route::group(['middleware' => 'web'], function(){
	Route::auth();
	Route::get('/home', 'HomeController@index');

	Route::group(['middleware' => 'auth'], function(){
		Route::resource('post', 'PostController');
	});
});

/*Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('home', 'HomeController@index');
    Route::pattern('id', '[0-9]+');
	Route::get('/', 'FrontController@index');
	Route::get('article/{id}', 'FrontController@show');
	Route::get('category/{id?}', 'FrontController@showPostByCat');
	Route::get('user/{id}/posts', 'FrontController@showPostByUser');

    Route::group(['middleware' => 'auth'], function () {
    	route::resource('post','PostController');
    });
});


class Crypt 
{
    public function __construct($ip)
    {
        $this->ip = $ip;
    }
}
App::bind('ip',function($app){
    return new Crypt($app->make('request')->getClientIp());
});

$crypt = App::make('ip');*/