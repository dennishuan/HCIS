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
	   return View::make('file.index');	//
	}

	public function upload()
	{

	   if(Input::hasFile('file'))
	   {
	    $data = json_decode(file_get_contents(Input::file('file')), true);
	    foreach ($data as $values)
	     {
		$patient = new Patient();
		$patient->fill($values)->save();
	     }
	     return('success');
	 }

	   return Redirect::back()->withErrors('Please select a File');
		//
	}

	public function export()
	{
	 $id = Input::get('id');
	 $patient = Patient::find($id);	 
	 $file = new Filesystem();
	 $file->put("output.json", $patient); 
	 return ($patient);

	//
	}

	public function exportall()
        {
         $patients = Patient::all();
         $file = new Filesystem();
         $file->put("output.json", $patients);
         return ('success');
	}

}
