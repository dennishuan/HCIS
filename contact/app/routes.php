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

Route::get('/', function()
{
	/*
	User::create([
		'name' => 'wabber',
		'email' => 'jIBBER',
		'phone' => '121 3242'
	]);
	*/
	
	return User::all();

});

Route::get('users', function()
{
	$users = User::all();
	
	return View::make('users.index')->withUsers($users);
});

Route::get('/users/new', function()
{
	return View::make('/users/new');
});

Route::post('register_action', function()
{
	$obj = new RegisterController();
	return $obj->store();
});

Route::get('users/{id}', function($id)
{
	$user = User::whereId($id)->first();
	
	return View::make('users.show', ['user' => $user]);
});


