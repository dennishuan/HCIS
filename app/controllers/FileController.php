<?php
use Illuminate\Filesystem\Filesystem;

class FileController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	  return View::make('file.index');//
	 
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() //basic import of single patient
	{
	 if(Input::hasFile('file'))
	 {
	  $data = json_decode(file_get_contents(Input::file('file')), true);
	  $patient = new Patient();
	  $patient->fill($data)->save();
	  return View::make('file.show')->with('patient',$patient);
	 }
	
	 return Redirect::back()->withErrors('Please select a File');
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() //basic export of single patient
	{
	 $id = Input::get('id');
	 $patient = Patient::find($id);
	 $file = new Filesystem();
	 $file->put("output.json", $patient);
	 return ($patient);
		//
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
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
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
