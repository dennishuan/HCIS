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
       if(Input::hasFile('file'))
        {
        $records = json_decode(file_get_contents(Input::file('file')), true);

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

        return Redirect::back()->withErrors('Please select a File');

}



    //export all patients currently to patients.jon in public
    public function exportPat(){
    
        $patient = Patient::find(55);
	//foreach($patients as $patient)
	//{
	$pid = $patient->id;
	$newpat[$pid] = $patient;
	//}
	$newpat = json_encode($newpat);
        $file = new FileSystem();
        $filename = sha1(time().time()).".json";
        $path = storage_path('files/export/'. $filename);
        $file->put($path, $newpat);
        
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
        $records = Record::where('patient_id', '55')->get();
	foreach($records as $record)
	{
	$rid = $record->id;	
        $phn = Patient::where('id', $record['patient_id'])->first()->phn;
	$username = User::where('id', $record['user_id'])->first()->username;
	$abbrev = Facility::where('id', $record['facility_id'])->first()->abbrev;
	unset($record['patient_id']);
	unset($record['facility_id']);
	unset($record['user_id']);
	unset($record['id']);
	$record->phn = $phn;
	$record->abbrev = $abbrev;
	$record->username = $username;
	$newrec[$rid] = $record;
	}

	$newrec = json_encode($newrec);	
	
	
	$file = new FileSystem();
        $filename = sha1(time().time()).".json";
        $path = storage_path('files/export/'. $filename);
        $file->put($path, $newrec);
        
        // Check if file exist
        if (File::exists($path)){
            return Response::download($path);
        }
        else{
            return Redirect::action('RecordController@index')->with('flash_message_danger', 'Export file failed to generate.');
        }
	
	
    }



}
