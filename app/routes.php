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

Route::resource('patient', 'PatientController');


Route::get('files', 'FileController@index');

Route::post('loadfile', 'FileController@create');


Route::get('image', function()
{
        $patients = DB::table('patients')->take(10)->get();
        return View::make('image', ['patients' => $patients]);
});

Route::post('upload', function()
{
	$image = Input::file('image');
	
	$filename = $image->getClientOriginalName();
	
	$path = public_path('img/'. $filename);
	
	$photo = new Photo();
	$photo->ref = Input::get('ref');
	$photo->image = $path;
	if(Image::make($image->getRealPath())->resize('280','200')->save($path) && $photo->save())
	{
		
		return Redirect::to('picture')->with('num', $photo->ref);
	}
	
});

Route::get('picture', function()
{
	$num = Session::get('num');
	$photo = Photo::where('ref', '=', $num)->first();
	$patient = Patient::where('phn', '=', $num)->first();
	return View::make('picture', ['patient' => $patient, 'photo' => $photo]);
});



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
