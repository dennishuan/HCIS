<?php

class FilesController extends \BaseController {

	public function profile($filename){
		return Response::download(storage_path('files/profile/'. $filename));
	}

	public function record($filename){
		return Response::download(storage_path('files/record/'. $filename));
	}


	//upload multiple patient json must be perfect/no validation
	public function uploadPat()
	{
		if(Input::hasFile('file'))
		{
			$data = json_decode(file_get_contents(Input::file('file')), true);
			foreach ($data as $values)
			{
				$patient = new Patient();
				$patient->fill($values)->save();
			}

			return Redirect::to('patient')->with('flash_message_success', 'files successfully uploaded');
		}
		return Redirect::back()->withErrors('Please select a File');
	}


	public function uploadRec()
	{
		if(Input::hasFile('file'))
		{
			$data = json_decode(file_get_contents(Input::file('file')), true);
			foreach ($data as $values)
			{
				$record = new Record();
				$patient->fill($values)->save();
			}
			return Redirect::to('record')->with('flash_message_success','files successfully uploaded');
		}
		return Redirect::back()->withErrors('Please select a File');
	}

	//export all patients currently to output.jon in public
	public function exportPat()
	{
		$patients = Patient::all();
		$file = new FileSystem();
		$file->put("output.json", $patients);
		return Redirect::to('patients')->with('flash_message_success', 'patients exported to public folder');
	}

	//variable record export for input(bytype, typename) NOTWORKING
	public function exportRec()
	{
		$input = Input::all();
		$records = Record::where($input[1], '=', $input[2]);
		$file = new FileSystem();
		$file->put("output.json", $patients);
		return Redirect::to('record')->with('flash_message_success', 'records s exported to public folde');
	}



}
