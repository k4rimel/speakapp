<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/* Admin routes */
Route::get('/admin', array('as' => 'admin.index', 'before' => 'auth', function() { return Response::make('admin panel');}));
/* end Admin routes */

/* Main routes */
Route::get('/welcome', array('as' => 'main.welcome', function() { return View::make('main.welcome');}));
Route::get('/', array( 'as' => 'main.index', 'before' => 'auth', function() { return View::make('main.index');}));
Route::get('/login', array('as' => 'main.login', 'before' => 'guest', function() { return View::make('main.index');}));
Route::get('/signup', array('as' => 'main.signup', 'uses' => 'ProfileController@showSignupPage'));
/* end Main routes */

/* Profile routes */
	/* protected routes */
	Route::get('/profile/edit/{profilename}', array('before' => 'auth', 'as' => 'profile.edit', 'uses' => 'ProfileController@editProfile'))->where(array('profilename' => '^[a-zA-Z-]+(\.{1}[a-zA-Z-]+)?$'));
	Route::get('/profile/{profilename}/friends', array('before' => 'auth', 'as' => 'profile.friendlist', 'uses' => 'ProfileController@showFriendlist'))->where(array('profilename' => '^[a-zA-Z-]+(\.{1}[a-zA-Z-]+)?$'));
	Route::post('/profile/add/{profileid}', array('before' => 'auth', 'as' => 'profile.add', 'uses' => 'ProfileController@addFriend'))->where(array('profileid' => '^[0-9]*$'));
		/* api routes */
		Route::get('/api/languages', array('before' => 'auth', 'as' => 'api.languages', 'uses' => 'ProfileController@getLanguages'));
		/* end api routes */
	/* end protected routes */
Route::get('/profile/{profilename}', array('as' => 'profile.show', 'uses' => 'ProfileController@showProfile'))->where(array('profilename' => '^[a-zA-Z-]+(\.{1}[a-zA-Z-]+)?$'));
Route::post('/signup', array('as' => 'profile.signup', 'uses' => 'ProfileController@signup'));
Route::post('/signin', array('as' => 'profile.signin', 'uses' => 'ProfileController@signin'));
Route::get('/signout', array('as' => 'profile.signout', 'uses' => 'ProfileController@signout'));

Route::resource('profiles', 'ProfileController');
/* end Profile routes */

/* Chat routes */
Route::get('/chat', array('as' => 'chat.index', 'uses' => 'ChatController@index'));
/* end Chat routes */

/* Search routes */

Route::get('/search', array('before' => 'auth', 'as' => 'search', 'uses' => 'SearchController@search'));

/* end Search routes */




/* API Routes */
// Route::group(array('prefix' => 'api'), function() {
//     Route::resource('authenticate', 'AuthenticationController');
// });

// Route::any('{all}', function($uri) {
// 	return View::make('index');
// })->where('all', '.*');
/* end API Routes */
