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

Route::get('login', ['as' => 'login.create', function()
{
    //If auth go back.
    if(Auth::check()){
        return Redirect::intended();
    }
    return View::make('login');
}]);

Route::post('login', ['as' => 'login.store', function()
{
    //Get input, then try to auth the user.
    $input = Input::all();

    $attemp = Auth::attempt([
        'username' => $input['username'],
        'password' => $input['password']
    ], true);

    if($attemp){
        return Redirect::intended()->with('flash_message', 'You have been logged in!');
    }else{
        return Redirect::to('login')->with('flash_message', 'Invalid credentials')->withInput();
    }
}]);

Route::post('logout', ['as' => 'login.destroy', 'before' => 'auth', function()
{
    Auth::logout();

    return Redirect::intended()->with('flash_message', 'You have been logged out!');
}]);
