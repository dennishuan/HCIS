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
    public function index($patient_id)
    {
        //If the URL includes query string 'search'
        //and store the corresponding value in $keyword
        if($keyword = Input::get('search')){
            //Search for the keyword in database
            //Then paginate the result
            //Note paginate replace function such as all() or get()
            $records = $this->record->where('patient_id', $patient_id)->where('notes', 'LIKE', '%'.$keyword.'%')->paginate(20);

            //Return the $patient for view to paginate.
            return View::make('patient.record.index', ['patient_id' => $patient_id, 'records' => $records, 'keyword' => $keyword]);
        }else{
            //Show a list of all the patient
            $records = $this->record->where('patient_id', $patient_id)->paginate(20);

            return View::make('patient.record.index', ['patient_id' => $patient_id, 'records' => $records, 'keyword' => null]);
        }
    }


    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create($patient_id)
    {
        //Show a form to create new patient.
        return View::make('patient.record.create', ['patient_id' => $patient_id]);
    }


    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function store($patient_id)
    {
        //Redirect back to the index after storing.
        $input = Input::all();

        //Validation
        if( ! $this->record->fill($input)->isValid())
        {
            //For Json API
            if(Request::isJson()){
                return Response::make($this->record->errors, 400, ['Location'=>route('patient.record.index', ['patient_id' => $patient_id])]);
            }

            return Redirect::back()->withInput()->withErrors($this->record->errors);
        }

        $this->record->save();

        //For Json API
        if(Request::isJson()){
            return Response::make('Record stored', 201, ['Location'=>route('patient.record.show', ['patient_id' => $patient_id, 'record' => $this->record->id])]);
        }

        return Redirect::route('patient.record.index', ['patient_id' => $patient_id]);
    }


    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function show($patient_id, $id)
    {
        //
        $record = $this->record->findOrFail($id);

        //JSON API
        if (Request::wantsJson())
        {
            return $record->toJson();
        }

        return View::make('patient.record.show', ['patient_id' => $patient_id, 'record' => $record]);
    }


    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($patient_id, $id)
    {
        //
        $record = $this->record->findOrFail($id);

        return View::make('patient.record.edit', ['patient_id' => $patient_id, 'record'=>$record]);
    }


    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function update($patient_id, $id)
    {
        //Get input then update
        $input = Input::all();

        $record = $this->record->findOrFail($id);

        if(! $record->fill($input)->isValid())
        {
            //For Json API
            if(Request::isJson()){
                return Response::make($this->record->errors, 400, ['Location'=>route('patient.record.index', ['patient_id' => $patient_id])]);
            }

            return Redirect::back()->withInput()->withErrors($record->errors);
        }

        $record->save();

        //For Json API
        if(Request::isJson()){
            return Response::make('Record edited', 202, ['Location'=>route('patient.record.show', ['patient_id' => $patient_id, 'record' => $id])]);
        }

        return Redirect::route('patient.record.show', ['patient_id' => $patient_id, 'record' => $id]);
    }


    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($patient_id, $id)
    {
        //
        $record = $this->record->findOrFail($id)->delete();

        if(Request::isJson()){
            return Response::make('Patient deleted', 202, ['Location'=>route('patient.record.index', ['patient_id' => $patient_id])]);
        }

        return Redirect::route('patient.record.index', ['patient_id' => $patient_id]);
    }

    public function search($patient_id){
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
        $url = qs_url(route('patient.record.index', $patient_id), ['search' => $keyword]);

        // Redirect to /patient/?search={$keyword}
        return Redirect::to($url);
    }

}
