<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

App::error(function(ModelNotFoundException $e){
    return Response::make('Not Found', 404);
});

class FacilityController extends \BaseController {


    protected $facility;


    public function __construct(Facility $facility)
    {
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

        if(array_key_exists('search', $input) && $input['search'] === 'true'){
            // get the rest of query string.
            $qs = array_except($input, ['search']);

            $facilities = $this->facility->search($qs)->paginate(20);

            //Return the $facility for view to paginate.
            $keyword = null;
            if(array_key_exists('keyword', $qs)){
                $keyword = $qs['keyword'];
            }
            return View::make('facility.index', ['facilities' => $facilities, 'keyword' => $keyword]);
        }else{
            //Show a list of all the facility
            $facilities = $this->facility->paginate(20);

            return View::make('facility.index', ['facilities' => $facilities, 'keyword' => null]);
        }
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
        if( ! $this->facility->fill($input)->isValid())
        {
            //For Json API
            if(Request::isJson()){
                return Response::make($this->facility->errors, 400, ['Location'=>route('facility.index')]);
            }

            return Redirect::back()->withInput()->withErrors($this->facility->errors);
        }

        $this->facility->save();

        //For Json API
        if(Request::isJson()){
            return Response::make('facility stored', 201, ['Location'=>route('facility.show', ['facility' => $this->facility->id])]);
        }

        return Redirect::route('facility.index');
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

        //JSON API
        if (Request::wantsJson())
        {
            return $facility->toJson();
        }

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

        if(! $facility->fill($input)->isValid())
        {
            //For Json API
            if(Request::isJson()){
                return Response::make($this->facility->errors, 400, ['Location'=>route('facility.index')]);
            }

            return Redirect::back()->withInput()->withErrors($facility->errors);
        }

        $facility->save();

        //For Json API
        if(Request::isJson()){
            return Response::make('facility edited', 202, ['Location'=>route('facility.show', ['facility' => $id])]);
        }

        return Redirect::route('facility.show', $id);
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
        $facility = $this->facility->findOrFail($id)->delete();

        if(Request::isJson()){
            return Response::make('facility deleted', 202, ['Location'=>route('facility.index')]);
        }

        return Redirect::route('facility.index');
    }

    public function search(){
        //Makes a URL with query string then redecirts to it.
        $keyword = Input::get('keyword');

        $url = qs_url('facility', ['search' => 'true', 'keyword' => $keyword]);

        // Redirect to /facility/?search={$keyword}
        return Redirect::to($url);
    }

}
