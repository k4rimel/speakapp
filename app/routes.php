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
Route::resource('profiles', 'ProfileController');		

Route::get('/', function()
	{
		return View::make('login.index');
	}
);


Route::group(array('prefix' => 'api'), function() {
	Route::resource('message', 'CommentController', 
		array('except' => array('create', 'edit', 'update')));
});



Route::get('/admin', array(
	'before' => 'auth',
	function()
	{
		return Response::make('admin panel');
	}
));


Route::get('/signout', array('as' => 'profile.signout', 'uses' => 'ProfileController@signout'));
Route::get('/profile/{profilename}', array('before' => 'guest', 'as' => 'profile.show', 'uses' => 'ProfileController@showProfile'))->where(array('profilename' => '^[a-zA-Z-]+(\.{1}[a-zA-Z-]+)?$'));
Route::post('/signup', array('as' => 'profile.signup', 'uses' => 'ProfileController@signup'));
Route::post('/signin', array('as' => 'profile.signin', 'uses' => 'ProfileController@signin'));