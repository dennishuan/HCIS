<?php

class PatientController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	  $patients = Patient::all();
	

          return View::make('patient.index', ['patients' => $patients]);
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	 
	 return View::make('patient.create');
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	
	 if ( ! Patient::isValid(Input::all()))
	 {
		return Redirect::back()->withInput()->withErrors(Patient::$errors);
	 }
	
	 $input = Input::all();
         $patient = new Patient();
         $patient->fill($input)->save();

         return Redirect::route('patient.index');
	
	//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($patientname)
	{
	  $patient = Patient::whereFirst_name($patientname)->first();

	  return View::make('patient.show', ['patient' => $patient]);
	  

		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)

	{
	 $patient = Patient::find($id);
	 return View::make('patient.edit', ['patient' => $patient]);
	 
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{

         if ( ! Patient::isValid(Input::all()))
         {
             return Redirect::back()->withInput()->withErrors(Patient::$errors);
         }

         //$input = Input::all(); //these are from store---how to update??
         //$patient = new Patient();
         //$patient->fill($input)->save();
        // return Redirect::route('patient.index');
	// $patien = GETTHEPATIENT
	// $patient->fill($input)->isValid()
	// $patient->save();	
		return('update');
		//
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
	}


}
