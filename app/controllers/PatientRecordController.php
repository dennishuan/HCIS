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
    public function index()
    {
        //If the URL includes query string 'search'
        //and store the corresponding value in $keyword
        if($keyword = Input::get('search')){
            //Search for the keyword in database
            //Then paginate the result
            //Note paginate replace function such as all() or get()
            $patients = $this->record->where('id', 'LIKE', '%'.$keyword.'%')->paginate(20);

            //Return the $patient for view to paginate.
            return View::make('patient.record.index', ['patients' => $patients, 'keyword' => $keyword]);
        }else{
            //Show a list of all the patient
            $patients = $this->patient->paginate(20);

            return View::make('patient.record.index', ['patients' => $patients, 'keyword' => null]);
        }
    }


    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        //Show a form to create new patient.
        return View::make('patient.record.create');
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
        if( ! $this->patient->fill($input)->isValid())
        {
            //For Json API
            if(Request::isJson()){
                return Response::make($this->patient->errors, 400, ['Location'=>route('patient.record.index')]);
            }

            return Redirect::back()->withInput()->withErrors($this->patient->errors);
        }

        $this->patient->save();

        //For Json API
        if(Request::isJson()){
            return Response::make('Patient stored', 201, ['Location'=>route('patient.record.show', ['patient' => $this->patient->id])]);
        }

        return Redirect::route('patient.record.index');
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
        $patient = $this->patient->findOrFail($id);

        //JSON API
        if (Request::wantsJson())
        {
            return $patient->toJson();
        }

        return View::make('patient.record.show', ['patient' => $patient]);
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
        $patient = $this->patient->findOrFail($id);

        return View::make('patient.record.edit', ['patient'=>$patient]);
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

        $patient = $this->patient->findOrFail($id);

        if(! $patient->fill($input)->isValid())
        {
            //For Json API
            if(Request::isJson()){
                return Response::make($this->patient->errors, 400, ['Location'=>route('patient.record.index')]);
            }

            return Redirect::back()->withInput()->withErrors($patient->errors);
        }

        $patient->save();

        //For Json API
        if(Request::isJson()){
            return Response::make('Patient edited', 202, ['Location'=>route('patient.record.show', ['patient' => $id])]);
        }

        return Redirect::route('patient.record.show', $id);
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
        $patient = $this->patient->findOrFail($id)->delete();

        if(Request::isJson()){
            return Response::make('Patient deleted', 202, ['Location'=>route('patient.record.index')]);
        }

        return Redirect::route('patient.record.index');
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
        $url = qs_url(route('patient.record.index', $this->patient->id), ['search' => $keyword]);

        // Redirect to /patient/?search={$keyword}
        return Redirect::to($url);
    }

}
