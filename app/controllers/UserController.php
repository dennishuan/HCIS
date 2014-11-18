<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

App::error(function(ModelNotFoundException $e){
    return Response::make('Not Found', 404);
});

class UserController extends \BaseController {


    protected $user;


    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        //If the URL includes query string 'search'
        $input = Input::all();

        if(array_key_exists('search', $input) && $input['search'] === 'true'){
            // get the rest of query string.
            $qs = array_except($input, ['search']);

            $users = $this->user->search($qs)->paginate(20);

            //Return the $user for view to paginate.
            $keyword = null;
            if(array_key_exists('keyword', $qs)){
                $keyword = $qs['keyword'];
            }
            return View::make('user.index', ['users' => $users, 'keyword' => $keyword]);
        }else{
            //Show a list of all the user
            $users = $this->user->paginate(20);

            if (Request::wantsJson())
            {
                return $this->user->all()->toJson();
            }

            return View::make('user.index', ['users' => $users, 'keyword' => null]);
        }
    }


    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        //Show a form to create new user.
        return View::make('user.create');
    }


    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function store()
    {
        //Redirect back to the index after storing.
        $input = Input::all();

        //Validation
        if( ! $this->user->fill($input)->isValid())
        {
            //For Json API
            if(Request::isJson()){
                return Response::make($this->user->errors, 400, ['Location'=>route('user.index')]);
            }

            return Redirect::back()->withInput()->withErrors($this->user->errors);
        }

        $this->user->save();

        //For Json API
        if(Request::isJson()){
            return Response::make('user stored', 201, ['Location'=>route('user.show', ['user' => $this->user->id])]);
        }

        return Redirect::route('user.index');
    }


    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function show($id)
    {
        //
        $user = $this->user->findOrFail($id);

        //JSON API
        if (Request::wantsJson())
        {
            return $user->toJson();
        }

        return View::make('user.show', ['user' => $user]);
    }


    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {
        //
        $user = $this->user->findOrFail($id);

        return View::make('user.edit', ['user'=>$user]);
    }


    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function update($id)
    {
        //Get input then update
        $input = Input::all();

        $user = $this->user->findOrFail($id);

        if(! $user->fill($input)->isValid())
        {
            //For Json API
            if(Request::isJson()){
                return Response::make($this->user->errors, 400, ['Location'=>route('user.index')]);
            }

            return Redirect::back()->withInput()->withErrors($user->errors);
        }

        $user->save();

        //For Json API
        if(Request::isJson()){
            return Response::make('user edited', 202, ['Location'=>route('user.show', ['user' => $id])]);
        }

        return Redirect::route('user.show', $id);
    }


    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id)
    {
        //
        $user = $this->user->findOrFail($id)->delete();

        if(Request::isJson()){
            return Response::make('user deleted', 202, ['Location'=>route('user.index')]);
        }

        return Redirect::route('user.index');
    }

    public function search(){
        //Makes a URL with query string then redecirts to it.
        $keyword = Input::get('keyword');

        $url = qs_url('user', ['search' => 'true', 'keyword' => $keyword]);

        // Redirect to /user/?search={$keyword}
        return Redirect::to($url);
    }

    public function massDelete(){



    }

}
