<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::group(['as' => 'blog'], function() {
	/* post index */
	Route::get('/', 'BlogController@index');
	Route::get('/author/{user}', 'BlogController@byUser');
	Route::get('/tags/{tag}', 'BlogController@byTag');
	Route::get('/{year}', 'BlogController@byYear');
	Route::get('/{year}/{month}', 'BlogController@byMonth');

	/* post view */
	Route::get('/{year}/{month}/{post}', 'PostController@view');
});