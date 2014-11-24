<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

App::error(function(ModelNotFoundException $e){
    return Response::make('Not Found', 404);
});

class FacilityController extends \BaseController {


    protected $facility;


    public function __construct(Facility $facility)
    {
        $this->beforeFilter('admin', ['only' => ['create', 'store', 'edit', 'update', 'destroy', 'ajax']]);
        $this->facility = $facility;
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

        if (Request::ajax()){
            if (array_key_exists('search', $input) && $input['search'] === 'true'){
                // get the rest of query string.
                $qs = array_except($input, ['search']);

                //Search and filter out the data.
                $facilities =$this->facility->search($qs)->select(['id', 'abbrev', 'type', 'name', 'phone', 'address', 'postal_code'])->get()->toJson();

                return $facilities;
            }
            else{
                //Show a list of all the facility
                $facilities = $this->facility->select(['id', 'abbrev', 'type', 'name', 'phone', 'address', 'postal_code'])->get()->toJson();

                return $facilities;
            }
        }

        return View::make('facility.index');
    }


    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        //Show a form to create new facility.
        return View::make('facility.create');
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
        if( ! $this->facility->fill($input)->isValid()){
            return Redirect::back()->withInput()->withErrors($this->facility->errors)->with('flash_message_danger', 'Invalid input');
        }

        $this->facility->save();

        return Redirect::route('facility.index')->with('flash_message_success', 'New entry have been created');
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
        $facility = $this->facility->findOrFail($id);

        return View::make('facility.show', ['facility' => $facility]);
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
        $facility = $this->facility->findOrFail($id);

        return View::make('facility.edit', ['facility'=>$facility]);
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

        $facility = $this->facility->findOrFail($id);

        if(! $facility->fill($input)->isValid()){
            return Redirect::back()->withInput()->withErrors($facility->errors)->with('flash_message_danger', 'Invalid input');
        }

        $facility->save();

        return Redirect::route('facility.show', $id)->with('flash_message_success', 'The entry has been updated.');
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
        $this->facility->findOrFail($id)->delete();

        return Redirect::route('facility.index')->with('flash_message_info', 'The entry has been deleted.');
    }

    public function search(){
        //Makes a URL with query string then redecirts to it.
        $keyword = Input::get('keyword');

        $url = qs_url('facility', ['search' => 'true', 'keyword' => $keyword]);

        // Redirect to /facility/?search={$keyword}
        return Redirect::to($url)->with('flash_message_success', 'Search completed.');
    }

    public function ajax(){
        $input = Input::all();

        //For mass delete request
        if ($input['action'] === 'delete'){
            foreach ($input['input'] as $facilities){
                $this->destroy($facilities['id']);
            }
        }
        return "successfully deleted";
    }

}
