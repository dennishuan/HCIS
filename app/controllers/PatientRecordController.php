<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

App::error(function(ModelNotFoundException $e)
{
    return Response::make('Not Found', 404);
});

class PatientRecordController extends \BaseController {


    protected $patient;
    protected $record;


    public function __construct(Patient $patient, Record $record)
    {
        //Store the model at the time of construct.
        $this->patient = $patient;
        $this->record = $record;
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
            $records = $this->patient->findOrFail($id)->record()->where('name', 'LIKE', '%'.$keyword.'%')->paginate(20);

            //Return the $patient for view to paginate.
            return View::make('patient.record.index', ['id' => $id, 'records' => $records, 'keyword' => $keyword]);
        }else{
            //Show a list of all the patient
            $records = $this->patient->findOrFail($id)->record()->paginate(20);

            return View::make('patient.record.index', ['id' => $id, 'records' => $records, 'keyword' => null]);
        }
    }


    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create($id)
    {
        //Show a form to create new patient.
        return View::make('patient.record.create');
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
        if( ! $this->record->fill($input)->isValid())
        {
            //For Json API
            if(Request::isJson()){
                return Response::make($this->record->errors, 400, ['Location'=>route('patient.record.index', ['id' => $id])]);
            }

            return Redirect::back()->withInput()->withErrors($this->record->errors);
        }

        $this->record->save();

        //For Json API
        if(Request::isJson()){
            return Response::make('Record stored', 201, ['Location'=>route('patient.record.show', ['id' => $id, 'record_id' => $this->record->id])]);
        }

        return Redirect::route('patient.record.index', ['id' => $id]);
    }


    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function show($id, $record_id)
    {
        $record = $this->record->findOrFail($record_id);

        //JSON API
        if (Request::wantsJson())
        {
            return $record->toJson();
        }

        return View::make('patient.record.show', ['id' => $id, 'record' => $record]);
    }


    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id, $record_id)
    {
        //
        $record = $this->record->findOrFail($record_id);

        return View::make('patient.record.edit', ['id' => $id, 'record'=>$record]);
    }


    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function update($id, $record_id)
    {
        //Get input then update
        $input = Input::all();

        $record = $this->record->findOrFail($record_id);

        if(! $record->fill($input)->isValid())
        {
            //For Json API
            if(Request::isJson()){
                return Response::make($this->record->errors, 400, ['Location'=>route('patient.record.index', ['id' => $id])]);
            }

            return Redirect::back()->withInput()->withErrors($record->errors);
        }

        $record->save();

        //For Json API
        if(Request::isJson()){
            return Response::make('Record edited', 202, ['Location'=>route('patient.record.show', ['id' => $id, 'record' => $id])]);
        }

        return Redirect::route('patient.record.show', ['id' => $id, 'record_id' => $record_id]);
    }


    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id, $record_id)
    {
        //
        $record = $this->record->findOrFail($record_id)->delete();

        if(Request::isJson()){
            return Response::make('Patient deleted', 202, ['Location'=>route('patient.record.index', ['id' => $id])]);
        }

        return Redirect::route('patient.record.index', ['id' => $id]);
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
        * qs_url(record, ['email' => 'sample@example.com', 'search' => 'something'])
        * will result in
        * /record?email=sample@example.com&search=something
        */
        $url = qs_url(route('patient.record.index', $id), ['search' => $keyword]);

        // Redirect to /patient/?search={$keyword}
        return Redirect::to($url);
    }
}
