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


/*****************************************************
*                       TEST                         *
* remove this and TestTokenController when deploying.*
* /testtoken/token
* /testtoken/no-token
* /testtoken/bad-token
****************************************************/
Route::controller('testtoken', 'TestTokenController');


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
	Route::post('user/ajax', ['as' => 'user.ajax', 'uses' => 'UserController@ajax']);
	Route::post('user/search', ['as' => 'user.search', 'uses' => 'UserController@search']);
	Route::resource('user', 'UserController');

	//File
	Route::post('user/{user}/upload', ['as' => 'user.upload', 'uses' => 'UserController@upload']);
	Route::post('patient/{patient}/upload', ['as' => 'patient.upload', 'uses' => 'PatientController@upload']);
	Route::post('record/{record}/upload', ['as' => 'record.upload', 'uses' => 'RecordController@upload']);
	Route::get('files/profile/{file}', ['uses' => 'FilesController@profile']);
	Route::get('files/record/{file}', ['uses' => 'FilesController@record']);
    
    //
    Route::get('test', function(){
            $events = array(
        "2014-04-09 10:30:00" => array(
            "Event 1",
            "Event 2 <strong> with html</stong>",
        ),
        "2014-04-12 14:12:23" => array(
            "Event 3",
        ),
        "2014-05-14 08:00:00" => array(
            "Event 4",
        ),
    );

    $cal = Calendar::make();
    /**** OPTIONAL METHODS ****/
    $cal->setDate(Input::get('cdate')); //Set starting date
    $cal->setBasePath('/dashboard'); // Base path for navigation URLs
    $cal->showNav(true); // Show or hide navigation
    $cal->setView(Input::get('cv')); //'day' or 'week' or null
    $cal->setStartEndHours(8,20); // Set the hour range for day and week view
    $cal->setTimeClass('ctime'); //Class Name for times column on day and week views
    $cal->setEventsWrap(array('<p>', '</p>')); // Set the event's content wrapper
    $cal->setDayWrap(array('<div>','</div>')); //Set the day's number wrapper
    $cal->setNextIcon('>>'); //Can also be html: <i class='fa fa-chevron-right'></i>
    $cal->setPrevIcon('<<'); // Same as above
    $cal->setDayLabels(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat')); //Label names for week days
    $cal->setMonthLabels(array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')); //Month names
    $cal->setDateWrap(array('<div>','</div>')); //Set cell inner content wrapper
    $cal->setTableClass('table'); //Set the table's class name
    $cal->setHeadClass('table-header'); //Set top header's class name
    $cal->setNextClass('btn'); // Set next btn class name
    $cal->setPrevClass('btn'); // Set Prev btn class name
    $cal->setEvents($events); // Receives the events array
    /**** END OPTIONAL METHODS ****/
        
        return View::make('test', ['cal' => $cal]);
    });
});





