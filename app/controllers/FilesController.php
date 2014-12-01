<?php
use Illuminate\Filesystem\Filesystem;
use SoapBox\Formatter\Formatter;
use League\Csv\Reader;

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
            $file = Input::file('file');
            $path = $file->getRealPath();


            $reader = new Reader($path);

            $keys = $reader->fetchOne();
            $reader->setOffset(1);

            $data = $reader->query();

            foreach ($data as $line_index => $row) {
                
                if(count($row) != 21){
                    continue;
                }
                
                $patient = array_combine($keys , $row);
                
                $patients = new Patient;
                if ($patients->fill($patient)->isValid())
                {
                    $patients->save();
                    $count++;
                }
            }

            return Redirect::to('patient')->with('flash_message_success', ''.$count.' files successfully uploaded');
        }
        return Redirect::back()->withErrors('Please select a File');
    }

    //upload multiple records
    public function uploadRec()
    {
        $count = 0;
        if(Input::hasFile('file'))
        {
            $file = Input::file('file');

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
        // Filter out id and image.
        $patients = Patient::select(['phn', 'name', 'preferred_name', 'sex', 'date_of_birth', 'address', 'postal_code', 'home_phone', 'work_phone', 'mobile_phone', 'email', 'emergency_name', 'emergency_phone', 'emergency_relationship', 'allergies', 'permanent_resident', 'medical_history', 'preferred_language', 'other_language', 'ethnic_background', 'family_doctor'])->get()->toArray();

        $filename = sha1(time().time()).".csv";
        $path = storage_path('files/export/'. $filename);

        $exporter_source = new \Exporter\Source\ArraySourceIterator($patients);

        $exporter_writer = new \Exporter\Writer\CsvWriter($path);

        \Exporter\Handler::create($exporter_source, $exporter_writer)->export();

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
        }

        $filename = sha1(time().time()).".csv";
        $path = storage_path('files/export/'. $filename);

        $exporter_source = new \Exporter\Source\ArraySourceIterator($records->toArray());

        $exporter_writer = new \Exporter\Writer\CsvWriter($path);

        \Exporter\Handler::create($exporter_source, $exporter_writer)->export();

        // Check if file exist
        if (File::exists($path)){
            return Response::download($path);
        }
        else{
            return Redirect::action('RecordController@index')->with('flash_message_danger', 'Export file failed to generate.');
        }
    }

}
