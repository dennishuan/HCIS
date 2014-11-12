<?php

class LoginController extends \BaseController {


    /**
     * Show the form for creating a new resource.
     * GET /login/create
     *
     * @return Response
     */
    public function create()
    {
        //If auth go back.
        if(Auth::check()){
            return Redirect::intended();
        }
        return View::make('login');
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

        if($attemp){
            return Redirect::intended()->with('flash_message', 'You have been logged in!');
        }else{
            return Redirect::to('login')->with('flash_message', 'Invalid credentials')->withInput();
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

        return Redirect::to('login')->with('flash_message', 'You have been logged out!');
    }

}
