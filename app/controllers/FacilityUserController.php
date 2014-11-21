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
        $input = Input::all();


        if (Request::ajax()){
            if (array_key_exists('search', $input) && $input['search'] === 'true'){
                // get the rest of query string.
                $qs = array_except($input, ['search']);

                //Search and filter out the data.
                $users = $this->facility->findOrFail($id)->user()->search($qs)->select(['id', 'username', 'type', 'name', 'email', 'phone'])->get()->toJson();

                return $users;
            }
            else{
                //Show a list of all the user
                $users = $this->facility->findOrFail($id)->user()->select(['id', 'username', 'type', 'name', 'email', 'phone'])->get()->toJson();

                return $users;
            }
        }

        return View::make('facility.user.index');
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

        if( ! $this->user->fill($input)->isValid()){
            return Redirect::back()->withInput()->withErrors($this->user->errors);
        }

        $this->user->save();

        return Redirect::route('facility.user.index', ['id' => $id])->with('flash_message_success', 'New entry have been created');
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
            return Redirect::back()->withInput()->withErrors($user->errors);
        }

        $user->save();

        return Redirect::route('facility.user.show', ['id' => $id, 'user_id' => $user_id])->with('flash_message_success', 'The entry has been updated.');
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

        return Redirect::route('facility.user.index', ['id' => $id])->with('flash_message_info', 'The entry has been deleted.');
    }

    public function search($id){
        //Makes a URL with query string then redecirts to it.
        $keyword = Input::get('keyword');


        $url = qs_url(route('facility.user.index', $id), ['search' => 'true', 'search' => $keyword]);

        // Redirect to /facility/?search={$keyword}
        return Redirect::to($url);
    }


    public function ajax(){
        $input = Input::all();

        //For mass delete request
        if ($input['action'] === 'delete'){
            foreach ($input['input'] as $users){
                $this->destroy($users['id']);
            }
        }
        return "successfully deleted";
    }
}
