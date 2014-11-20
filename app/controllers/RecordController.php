<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

App::error(function(ModelNotFoundException $e)
{
    return Response::make('Not Found', 404);
});


class RecordController extends \BaseController {


    protected $record;


    public function __construct(Record $record)
    {
        //Store the model at the time of construct.
        $this->record = $record;
    }


    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
	
        //If the URL includes query string 'search'
        //and store the corresponding value in $keyword
        if($keyword = Input::get('search')){
            //Search for the keyword in database
            //Then paginate the result
            //Note paginate replace function such as all() or get()
            $records = $this->record->where('subjective', 'LIKE', '%'.$keyword.'%')->paginate(20);
            // Need to add objective and assessment. not sure how that will look.

            //Return the $record for view to paginate.
            return View::make('record.index', ['records' => $records, 'keyword' => $keyword]);
        }else{
            //Show a list of all the record
            $records = $this->record->paginate(20);

            return View::make('record.index', ['records' => $records, 'keyword' => null]);
        }
    }


    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        //Show a form to create new record.
        return View::make('record.create');
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
        if( ! $this->record->fill($input)->isValid())
        {
            //For Json API
            if(Request::isJson()){
                return Response::make($this->record->errors, 400, ['Location'=>route('record.index')]);
            }

            return Redirect::back()->withInput()->withErrors($this->record->errors);
        }

        $this->record->save();

        //For Json API
        if(Request::isJson()){
            return Response::make('Record stored', 201, ['Location'=>route('record.show', ['record' => $this->record->id])]);
        }

        return Redirect::route('record.index');
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
        $record = $this->record->findOrFail($id);

        //JSON API
        if (Request::wantsJson())
        {
            return $record->toJson();
        }

        return View::make('record.show', ['record' => $record]);
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
        $record = $this->record->findOrFail($id);

        return View::make('record.edit', ['record'=>$record]);
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

        $record = $this->record->findOrFail($id);

        if(! $record->fill($input)->isValid())
        {
            //For Json API
            if(Request::isJson()){
                return Response::make($this->record->errors, 400, ['Location'=>route('record.index')]);
            }

            return Redirect::back()->withInput()->withErrors($record->errors);
        }

        $record->save();

        //For Json API
        if(Request::isJson()){
            return Response::make('Record edited', 202, ['Location'=>route('record.show', ['record' => $id])]);
        }

        return Redirect::route('record.show', $id);
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
        $record = $this->record->findOrFail($id)->delete();

        if(Request::isJson()){
            return Response::make('Record deleted', 202, ['Location'=>route('record.index')]);
        }

        return Redirect::route('record.index');
    }

    public function search(){
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
        $url = qs_url('record', ['search' => $keyword]);

        // Redirect to /record/?search={$keyword}
        return Redirect::to($url);
    }


}
