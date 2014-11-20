<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

App::error(function(ModelNotFoundException $e){
    return Response::make('Not Found', 404);
});

class PatientController extends \BaseController {


    protected $patient;


    public function __construct(Patient $patient)
    {
        $this->patient = $patient;
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
                $patients =$this->patient->search($qs)->select(['id', 'patientname', 'type', 'name', 'email', 'phone'])->get()->toJson();

                return $patients;
            }
            else{
                //Show a list of all the patient
                $patients = $this->patient->select(['id', 'patientname', 'type', 'name', 'email', 'phone'])->get()->toJson();

                return $patients;
            }
        }

        return View::make('patient.index');
    }


    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        //Show a form to create new patient.
        return View::make('patient.create');
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
        if( ! $this->patient->fill($input)->isValid()){
            return Redirect::back()->withInput()->withErrors($this->patient->errors);
        }

        $this->patient->save();

        return Redirect::route('patient.index')->with('flash_message_success', 'New entry have been created');
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

        return View::make('patient.show', ['patient' => $patient]);
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

        return View::make('patient.edit', ['patient'=>$patient]);
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

        if(! $patient->fill($input)->isValid()){
            return Redirect::back()->withInput()->withErrors($patient->errors);
        }

        $patient->save();

        return Redirect::route('patient.show', $id)->with('flash_message_success', 'The entry has been updated.');
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
        $this->patient->findOrFail($id)->delete();

        return Redirect::route('patient.index')->with('flash_message_info', 'The entry has been deleted.');
    }

    public function search(){
        //Makes a URL with query string then redecirts to it.
        $keyword = Input::get('keyword');

        $url = qs_url('patient', ['search' => 'true', 'keyword' => $keyword]);

        // Redirect to /patient/?search={$keyword}
        return Redirect::to($url)->with('flash_message_success', 'Search completed.');
    }

    public function ajax(){
        $input = Input::all();

        //For mass delete request
        if ($input['action'] === 'delete'){
            foreach ($input['input'] as $patients){
                $this->destroy($patients['id']);
            }
        }
        return "successfully deleted";
    }

}
