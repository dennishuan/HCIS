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
    return View::make('home');
}]);


//login
Route::get('login', ['as' => 'login.create', 'uses' => 'LoginController@create']);
Route::post('login', ['before' => 'csrf', 'as' => 'login.store', 'uses' => 'LoginController@store']);
Route::delete('logout', ['before' => 'csrf', 'as' => 'login.destroy', 'uses' => 'LoginController@destroy']);


//patient
Route::group(['before' => 'auth'], function(){
    Route::post('patient/search', ['as' => 'patient.search', 'uses' => 'PatientController@search']);
    Route::resource('patient', 'PatientController');
});

//patient/record
Route::group(['before' => 'auth'], function(){

    Route::resource('patient.record', 'PatientRecordController');
});


//facility
Route::group(['before' => 'auth'], function(){

    Route::resource('facility', 'FacilityController');
});


//facility/user
Route::group(['before' => 'auth'], function(){

    Route::resource('facility.user', 'FacilityUserController');
});


//user
Route::group(['before' => 'auth'], function(){

    Route::resource('user', 'UserController');
});





