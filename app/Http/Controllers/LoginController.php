<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;



App::error(function (ModelNotFoundException $e) {
               return response('Not Found', 404);
});

class LoginController extends Controller
{


    /**
    * Show the form for creating a new resource.
    * GET /login/create
    *
    * @return Response
    */
    public function create()
    {
        //If auth go back.
        if (Auth::check()) {
            return Redirect::intended();
        }
        return view('login');
    }

    /**
    * Store a newly created resource in storage.
    * POST /login
    *
    * @return Response
    */
    public function store()
    {
        //Get input, then try to auth the user.
        $input = Input::all();

        $attemp = Auth::attempt([
            'username' => $input['username'],
            'password' => $input['password']
        ], true);

        if ($attemp) {
            $user = Auth::user();

            $user->last_session = Session::getId();
            $user->save();

            return Redirect::intended()->with('flash_message_success', 'You have been logged in!');
        } else {
            return redirect('login')->with('flash_message_danger', 'Invalid credentials')->withInput();
        }
    }

    /**
    * Remove the specified resource from storage.
    * DELETE /login/{id}
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy()
    {
        Auth::logout();

        return redirect('login')->with('flash_message_info', 'You have been logged out!');
    }
}
