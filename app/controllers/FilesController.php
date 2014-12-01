<?php
use Illuminate\Filesystem\Filesystem;
use SoapBox\Formatter\Formatter;

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
    	$count=0;
        if(Input::hasFile('file'))
        {
            $data = json_decode(file_get_contents(Input::file('file')), true);
            foreach ($data as $values)
            {
                $patient = new Patient();
		$patient->fill($values);
		unset($patient['id']);
                if($patient->isvalid())
		{
		 $patient->save();
		 $count=$count+1;
		}
            }

            return Redirect::to('patient')->with('flash_message_success', ''.$count.' files successfully uploaded');
        }
        return Redirect::back()->withErrors('Please select a File');
    }

    //upload multiple records
    public function uploadRec()
    {
       if(Input::hasFile('file'))
        {
        $records = json_decode(file_get_contents(Input::file('file')), true);
	$count = 0;
	foreach($records as $fields)
	{
	$patient_id = Patient::where('phn', $fields['phn'])->first()->id;
	$facility_id = Facility::where('abbrev', $fields['abbrev'])->first()->id;
	$user_id = User::where('username', $fields['username'])->first()->id;
	$record = new Record();
	$record->fill($fields);
	if($record->isValid())
	{
	 unset($record['phn']);
	 unset($record['abbrev']);
	 unset($record['username']);
	 $record->patient_id = $patient_id;
	 $record->facility_id = $facility_id;
	 $record->user_id = $user_id;
	 $record->save();
	 $count = $count+1;
	}
	}
	return Redirect::route('record.index')->with('flash_message_success', ''.$count.' New entries have been created');
	}

        return Redirect::back()->withErrors('Please select a File');
	
}



    
    public function exportPat(){
    
        $patients = Patient::all()->toJson();
	$file = new FileSystem();
        $filename = sha1(time().time()).".csv";
        $path = storage_path('files/export/'. $filename);
	$formatter = Formatter::make($patients, Formatter::JSON);
	$csv = $formatter->toJson();
        $file->put($path, $csv);
        
        // Check if file exist
        if (File::exists($path)){
            return Response::download($path);
        }
        else{
            return Redirect::action('PatientController@index')->with('flash_message_danger', 'Export file failed to generate.');
        }
    }

    
    public function exportRec()
    {
        $records = Record::all();
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

	$file = new FileSystem();
        $filename = sha1(time().time()).".csv";
        $path = storage_path('files/export/'. $filename);
	$formatter = Formatter::make($newrec, Formatter::ARR);
	$csv = $formatter->toCsv();
        $file->put($path, $csv);
        
        // Check if file exist
        if (File::exists($path)){
            return Response::download($path);
        }
        else{
            return Redirect::action('RecordController@index')->with('flash_message_danger', 'Export file failed to generate.');
        }
    }


}
