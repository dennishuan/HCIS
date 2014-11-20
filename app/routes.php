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

//Listen to what SQL statement is being executed
/*
Event::listen('illuminate.query', function($sql){
    var_dump($sql);
});
*/


Route::get('/', ['as' => 'home', 'before' => 'auth' ,function(){
  return View::make('home');
}]);


//login
Route::get('login', ['as' => 'login.create', 'uses' => 'LoginController@create']);
Route::post('login', ['before' => 'csrf', 'as' => 'login.store', 'uses' => 'LoginController@store']);
Route::delete('logout', ['before' => 'csrf', 'as' => 'login.destroy', 'uses' => 'LoginController@destroy']);

//Search
Route::group(['before' => 'auth'], function(){
    Route::get('search', ['as' => 'search.index', 'uses' => 'SearchController@index']);
    Route::post('search', ['as' => 'search.store', 'uses' => 'SearchController@store']);
});

/*******************************
*   Require Auth
*************************************/
Route::group(['before' => 'auth'], function(){
  //Search
  Route::get('search', ['as' => 'search.index', 'uses' => 'SearchController@index']);
  Route::post('search', ['as' => 'search.store', 'uses' => 'SearchController@store']);

  //patient
  Route::post('patient/search', ['as' => 'patient.search', 'uses' => 'PatientController@search']);
  Route::resource('patient', 'PatientController');

  //patient/record
  Route::post('patient/{patient}/record/search', ['as' => 'patient.record.search', 'uses' => 'PatientRecordController@search']);
  Route::resource('patient.record', 'PatientRecordController');

  //record
  Route::post('record/search', ['as' => 'record.search', 'uses' => 'RecordController@search']);
  Route::resource('record', 'RecordController');

  //facility
  Route::post('facility/search', ['as' => 'facility.search', 'uses' => 'FacilityController@search']);
  Route::resource('facility', 'FacilityController');

  //facility/user
  Route::post('facility/{facility}/user/search', ['as' => 'facility.user.search', 'uses' => 'FacilityUserController@search']);
  Route::resource('facility.user', 'FacilityUserController');

  //user
  Route::post('user/ajax', ['as' => 'user.search', 'uses' => 'UserController@ajax']);
  Route::post('user/search', ['as' => 'user.search', 'uses' => 'UserController@search']);
  Route::resource('user', 'UserController');
});





