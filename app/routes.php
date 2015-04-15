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
Route::get('/', array( 'as' => 'main.index', 'before' => 'auth', function() { return View::make('main.index');}));
Route::get('/login', array('as' => 'main.login', 'before' => 'guest', function() { return View::make('main.index');}));
Route::get('/signup', array('as' => 'main.signup', function() { return View::make('signup.index');}));
/* end Main routes */

/* Profile routes */
Route::get('/signout', array('as' => 'profile.signout', 'uses' => 'ProfileController@signout'));
Route::get('/profile/{profilename}', array('as' => 'profile.show', 'uses' => 'ProfileController@showProfile'))->where(array('profilename' => '^[a-zA-Z-]+(\.{1}[a-zA-Z-]+)?$'));
Route::post('/signup', array('as' => 'profile.signup', 'uses' => 'ProfileController@signup'));
Route::post('/signin', array('as' => 'profile.signin', 'uses' => 'ProfileController@signin'));

Route::resource('profiles', 'ProfileController');
/* end Profile routes */