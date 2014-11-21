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
        $input = Input::all();

        //Show a list of all the record
        $records = $this->patient->findOrFail($id)->record()->select(['id', 'recordname', 'type', 'name', 'email', 'phone'])->get()->toJson();

        return $records;

        if (Request::ajax()){
            if (array_key_exists('search', $input) && $input['search'] === 'true'){
                // get the rest of query string.
                $qs = array_except($input, ['search']);

                //Search and filter out the data.
                $records = $this->patient->findOrFail($id)->record()->search($qs)->select(['id', 'recordname', 'type', 'name', 'email', 'phone'])->get()->toJson();

                return $records;
            }
            else{
                //Show a list of all the record
                $records = $this->patient->findOrFail($id)->record()->select(['id', 'recordname', 'type', 'name', 'email', 'phone'])->get()->toJson();

                return $records;
            }
        }

        return View::make('patient.record.index');
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
        if( ! $this->record->fill($input)->isValid()){
            return Redirect::back()->withInput()->withErrors($this->record->errors);
        }

        $this->record->save();

        return Redirect::route('patient.record.index', ['id' => $id])->with('flash_message_success', 'New entry have been created');
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
            return Redirect::back()->withInput()->withErrors($record->errors);
        }

        $record->save();

        return Redirect::route('patient.record.show', ['id' => $id, 'record_id' => $record_id])->with('flash_message_success', 'The entry has been updated.');
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

        return Redirect::route('patient.record.index', ['id' => $id])->with('flash_message_info', 'The entry has been deleted.');
    }

    public function search($id){
        //Makes a URL with query string then redecirts to it.
        $keyword = Input::get('keyword');

        $url = qs_url(route('patient.record.index', $id), ['search' => 'true', 'search' => $keyword]);

        // Redirect to /patient/?search={$keyword}
        return Redirect::to($url);
    }

    public function ajax(){
        $input = Input::all();

        //For mass delete request
        if ($input['action'] === 'delete'){
            foreach ($input['input'] as $records){
                $this->destroy($records['id']);
            }
        }
        return "successfully deleted";
    }
}
