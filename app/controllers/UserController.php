<?php

class UserController extends \BaseController {



    public function __construct()
    {
        // SET THE FILTERS.
        //$this->beforeFilter('csrf', array('on' => 'store') );
    }

    /**
     * Display a listing of the resource.
     * GET /users
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * GET /users/create
     *
     * @return Response
     */
    public function create()
    {
        //If auth go back.
        if(Auth::check()){
            return Redirect::back();
        }
        return View::make('user.create');
    }

    /**
     * Store a newly created resource in storage.
     * POST /users
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
            return Redirect::back()->with('flash_message', 'You have been logged in!');
        }else{
            return Redirect::back()->with('flash_message', 'Invalid credentials')->withInput();
        }
    }

    /**
     * Display the specified resource.
     * GET /users/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /users/{id}/edit
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /users/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /users/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Auth::logout();

        return Redirect::back()->with('flash_message', 'You have been logged out!');;
    }

}
