<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

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
//Event::listen('illuminate.query', function($sql){
//    if(Request::ajax()){
//        // Logs SQL query in /app/logs/ajax.log for SQL queries done by ajax.
//        $log = new Logger('name');
//        $log->pushHandler(new StreamHandler(storage_path().'/logs/ajax.log', Logger::INFO));
//
//        $log->addInfo($sql);
//    }else{
//        var_dump($sql);
//    }
//});


/********************
*   Require HTTPS   *
********************/
//Route::when('*', ['before' => 'ssl']);

/*******************
*   Require CSRF   *
*******************/
Route::when('*', ['before' => 'csrf'], ['post', 'put', 'delete']);


//Home
Route::get('/', ['as' => 'home', 'before' => 'auth' ,function(){
    return View::make('home');
}]);

//login
Route::get('login', ['as' => 'login.create', 'uses' => 'LoginController@create']);
Route::post('login', ['as' => 'login.store', 'uses' => 'LoginController@store']);
Route::delete('logout', ['as' => 'login.destroy', 'uses' => 'LoginController@destroy']);


/*******************************
*   Require Auth
*************************************/
Route::group(['before' => 'auth'], function(){
    //Search
    Route::get('search', ['as' => 'search.index', 'uses' => 'SearchController@index']);
    Route::post('search', ['as' => 'search.store', 'uses' => 'SearchController@store']);

    //patient
    Route::post('patient/ajax', ['as' => 'patient.ajax', 'uses' => 'PatientController@ajax']);
    Route::post('patient/search', ['as' => 'patient.search', 'uses' => 'PatientController@search']);
    Route::resource('patient', 'PatientController');

    //patient/record
    Route::post('patient/{patient}/record/search', ['as' => 'patient.record.search', 'uses' => 'PatientRecordController@search']);
    Route::resource('patient.record', 'PatientRecordController');

    //record
    Route::post('record/ajax', ['as' => 'record.ajax', 'uses' => 'RecordController@ajax']);
    Route::post('record/search', ['as' => 'record.search', 'uses' => 'RecordController@search']);
    Route::resource('record', 'RecordController');

    //facility
    Route::post('facility/ajax', ['as' => 'facility.ajax', 'uses' => 'FacilityController@ajax']);
    Route::post('facility/search', ['as' => 'facility.search', 'uses' => 'FacilityController@search']);
    Route::resource('facility', 'FacilityController');

    //facility/user
    Route::post('facility/{facility}/user/search', ['as' => 'facility.user.search', 'uses' => 'FacilityUserController@search']);
    Route::resource('facility.user', 'FacilityUserController');

    //user
    Route::get('user/{user}/password', ['as' => 'user.password', 'uses' => 'UserController@password']);
    Route::post('user/{user}/password', ['as' => 'user.updatePassword', 'uses' => 'UserController@updatePassword']);
    Route::post('user/ajax', ['as' => 'user.ajax', 'uses' => 'UserController@ajax']);
    Route::post('user/search', ['as' => 'user.search', 'uses' => 'UserController@search']);
    Route::resource('user', 'UserController');

    //File
    Route::post('user/{user}/upload', ['as' => 'user.upload', 'uses' => 'UserController@upload']);
    Route::post('patient/{patient}/upload', ['as' => 'patient.upload', 'uses' => 'PatientController@upload']);
    Route::post('record/{record}/upload', ['as' => 'record.upload', 'uses' => 'RecordController@upload']);
    Route::get('files/profile/{file}', ['uses' => 'FilesController@profile']);
    Route::get('files/record/{file}', ['uses' => 'FilesController@record']);

    //Export
    Route::get('patient/file/upPat', ['as'=>'file/upPat','uses'=>'FilesController@upPat']);
    Route::get('patient/file/exportPat',['as'=>'file/exportPat', 'uses'=>'FilesController@exportPat']);
    Route::post('uploadPat', 'FilesController@uploadPat');
    Route::get('record/file/upRec', ['as'=>'file/upRec','uses'=>'FilesController@upRec']);
    Route::get('record/file/exportRec',['as'=>'file/exportRec','uses'=>'FilesController@exportRec']);
    Route::post('uploadRec','FilesController@uploadRec');
});





