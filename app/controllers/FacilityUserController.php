<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

App::error(function(ModelNotFoundException $e)
{
    return Response::make('Not Found', 404);
});

class FacilityUserController extends \BaseController {


    protected $facility;
    protected $user;


    public function __construct(Facility $facility, User $user)
    {
        //Store the model at the time of construct.
        $this->facility = $facility;
        $this->user = $user;
    }


    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index($id)
    {
        //If the URL includes query string 'search'
        //and store the corresponding value in $keyword
        if($keyword = Input::get('search')){
            //Search for the keyword in database
            //Then paginate the result
            //Note paginate replace function such as all() or get()
            $users = $this->facility->findOrFail($id)->user()->where('name', 'LIKE', '%'.$keyword.'%')->paginate(20);

            //Return the $facility for view to paginate.
            return View::make('facility.user.index', ['id' => $id, 'users' => $users, 'keyword' => $keyword]);
        }else{
            //Show a list of all the facility
            $users = $this->facility->findOrFail($id)->user()->paginate(20);

            return View::make('facility.user.index', ['id' => $id, 'users' => $users, 'keyword' => null]);
        }
    }


    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create($id)
    {
        //Show a form to create new facility.
        return View::make('facility.user.create');
    }


    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function store($id)
    {
        //Redirect back to the index after storing.
        $input = Input::all();

        //Validation
        if( ! $this->user->fill($input)->isValid())
        {
            //For Json API
            if(Request::isJson()){
                return Response::make($this->user->errors, 400, ['Location'=>route('facility.user.index', ['id' => $id])]);
            }

            return Redirect::back()->withInput()->withErrors($this->user->errors);
        }

        $this->user->save();

        //For Json API
        if(Request::isJson()){
            return Response::make('User stored', 201, ['Location'=>route('facility.user.show', ['id' => $id, 'user_id' => $this->user->id])]);
        }

        return Redirect::route('facility.user.index', ['id' => $id]);
    }


    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function show($id, $user_id)
    {
        $user = $this->user->findOrFail($user_id);

        //JSON API
        if (Request::wantsJson())
        {
            return $user->toJson();
        }

        return View::make('facility.user.show', ['id' => $id, 'user' => $user]);
    }


    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id, $user_id)
    {
        //
        $user = $this->user->findOrFail($user_id);

        return View::make('facility.user.edit', ['id' => $id, 'user'=>$user]);
    }


    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function update($id, $user_id)
    {
        //Get input then update
        $input = Input::all();

        $user = $this->user->findOrFail($user_id);

        if(! $user->fill($input)->isValid())
        {
            //For Json API
            if(Request::isJson()){
                return Response::make($this->user->errors, 400, ['Location'=>route('facility.user.index', ['id' => $id])]);
            }

            return Redirect::back()->withInput()->withErrors($user->errors);
        }

        $user->save();

        //For Json API
        if(Request::isJson()){
            return Response::make('User edited', 202, ['Location'=>route('facility.user.show', ['id' => $id, 'user' => $id])]);
        }

        return Redirect::route('facility.user.show', ['id' => $id, 'user_id' => $user_id]);
    }


    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id, $user_id)
    {
        //
        $user = $this->user->findOrFail($user_id)->delete();

        if(Request::isJson()){
            return Response::make('Facility deleted', 202, ['Location'=>route('facility.user.index', ['id' => $id])]);
        }

        return Redirect::route('facility.user.index', ['id' => $id]);
    }

    public function search($id){
        //Makes a URL with query string then redecirts to it.
        $keyword = Input::get('keyword');

        /**
        * qs_url() is a custom function.
        * qs_url($path = null, $qs = array(), $secure = null)
        * $path is a string of URL path
        * $qs is a array of strings of querys
        * $secure is boolean on whether to use https or http
        * qs_url(user, ['email' => 'sample@example.com', 'search' => 'something'])
        * will result in
        * /user?email=sample@example.com&search=something
        */
        $url = qs_url(route('facility.user.index', $id), ['search' => $keyword]);

        // Redirect to /facility/?search={$keyword}
        return Redirect::to($url);
    }
}
