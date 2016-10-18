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

/* custom pages */
Route::group(['as' => 'contact', 'name' => 'contact'], function() {
	Route::get('/contact', 'ContactController@showContactForm');
	Route::post('/contact', 'ContactController@sendMessage');
});

Route::group(['as' => 'blog', 'name' => 'blog'], function() {
	/* minimal auth routes */
	Route::get('/login', 'Auth\LoginController@showLoginForm');
	Route::post('/login', 'Auth\LoginController@login');
	Route::get('/logout', 'Auth\LoginController@logout');
	
	/* syndication */
	Route::get('/rss', 'RSSController@index');
	Route::get('/rss/author/{user}', 'RSSController@byUser');
	Route::get('/rss/tags/{tag}', 'RSSController@byTag');
	Route::get('/rss/{year}', 'RSSController@byYear');
	Route::get('/rss/{year}/{month}', 'RSSController@byMonth');
	
	/* post index */
	Route::get('/home', function() {
		return redirect('/');
	});

	Route::get('/', 'BlogController@index');
	Route::get('/author/{user}', 'BlogController@byUser');
	Route::get('/tags/{tag}', 'BlogController@byTag');
	Route::get('/{year}', 'BlogController@byYear');
	Route::get('/{year}/{month}', 'BlogController@byMonth');

	/* post view */
	Route::get('/{year}/{month}/{post}', 'PostController@view');
});