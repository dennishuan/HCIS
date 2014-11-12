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

Route::get('/', ['as' => 'home', 'before' => 'auth' ,function()
{
    $patients = DB::table('patients')->paginate(20);

    return View::make('home', ['patients' => $patients]);
}]);

Route::get('login', ['as' => 'login.create', 'uses' => 'LoginController@create']);

Route::post('login', ['as' => 'login.store', 'uses' => 'LoginController@store']);

Route::post('logout', ['as' => 'login.destroy', 'uses' => 'LoginController@destroy']);
