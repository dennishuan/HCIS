<?php
use Illuminate\Filesystem\Filesystem;

class FilesController extends \BaseController {

    public function profile($filename){
        return Response::download(storage_path('files/profile/'. $filename));
    }

    public function record($filename){
        return Response::download(storage_path('files/record/'. $filename));
    }


    public function upPat(){ //display file input form REPLACE WITH MODAL

        return View::make('filep');
    }

    public function upRec(){ //same as uppat

        return View::make('filer');
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

    //upload multiple records
    public function uploadRec()
    {
       /*
       if(Input::hasFile('file'))
        {
            $data = json_decode(file_get_contents(Input::file('file')), true);
            foreach ($data as $values)
            {
                $record = new Record();
                $record->fill($values)->save();
            }
            return Redirect::to('record')->with('flash_message_success','files successfully uploaded');
        }
        return Redirect::back()->withErrors('Please select a File');
    }

*/
      	//Redirect back to the index after storing.
	$records = json_decode(file_get_contents(Input::file('file')), true);
	/*Validation							                if( ! $this->record->fill($input)->isValid()){
	    return Redirect::back()->withInput()->withErrors($this->record->errors)->with('flash_message_danger', 'Invalid input');
	    }
    	*/

		
	foreach($records as $fields)
	{
	$patient_id = Patient::where('phn', $fields['phn'])->first()->id;
	$facility_id = Facility::where('abbrev', $fields['abbrev'])->first()->id;
	$user_id = User::where('username', $fields['username'])->first()->id;
	
	
	$record = new Record();
	$record->fill($fields);
	unset($record['phn']);
	unset($record['abbrev']);
	unset($record['username']);
	$record->patient_id = $patient_id;
	$record->facility_id = $facility_id;
	$record->user_id = $user_id;
	
	$record->save();
	}

	return Redirect::route('record.index')->with('flash_message_success', 'New entry have been created');

}



    //export all patients currently to patients.jon in public
    public function exportPat(){
    
        $patients = Patient::all();
        $file = new FileSystem();
        $filename = sha1(time().time()).".json";
        $path = storage_path('files/export/'. $filename);
        $file->put($path, $patients);
        
        // Check if file exist
        if (File::exists($path)){
            return Response::download($path);
        }
        else{
            return Redirect::action('PatientController@index')->with('flash_message_danger', 'Export file failed to generate.');
        }
    }

    //export all records to records.json
    public function exportRec()
    {
        $records = Record::all();
        $file = new FileSystem();
        $filename = sha1(time().time()).".json";
        $path = storage_path('files/export/'. $filename);
        $file->put($path, $records);
        
        // Check if file exist
        if (File::exists($path)){
            return Response::download($path);
        }
        else{
            return Redirect::action('RecordController@index')->with('flash_message_danger', 'Export file failed to generate.');
        }
    }



}
