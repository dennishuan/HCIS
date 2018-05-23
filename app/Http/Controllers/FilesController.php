<?php
use Illuminate\Filesystem\Filesystem;
use SoapBox\Formatter\Formatter;
use League\Csv\Reader;

class FilesController extends \BaseController
{

    public function __construct()
    {
        $this->beforeFilter('admin', ['only' => ['uploadPat', 'exportPat', 'uploadRec', 'exportRec']]);
    }



    public function profile($filename)
    {
        return Response::download(storage_path('files/profile/'. $filename));
    }

    public function record($filename)
    {
        return Response::download(storage_path('files/record/'. $filename));
    }

    //upload multiple patient json must be perfect/no validation
    public function uploadPat()
    {
        $count=0;
        if (Input::hasFile('file')) {
            $file = Input::file('file');
            $path = $file->getRealPath();

            //Validate the file
            $rule = ['file' => 'mimes:csv'];
            $validation = Validator::make(['image'=>$file], $rule);
            if (! $validation->passes()) {
                return Redirect::back()->with('flash_message_danger', 'Files mismatch')->withErrors($validation);
            }

            $reader = new Reader($path);

            // Get the column names
            $keys = $reader->fetchOne();
            $reader->setOffset(1);

            // Loop over the rest of data.
            $data = $reader->query();
            foreach ($data as $line_index => $row) {
                // Ignore empty rows
                if (count($row) != 21) {
                    continue;
                }

                // Combine Key with the element
                $patient = array_combine($keys, $row);

                //Store validation the data
                $patients = new Patient;
                if ($patients->fill($patient)->isValid()) {
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
        if (Input::hasFile('file')) {
            $file = Input::file('file');
            $path = $file->getRealPath();

            //Validate the file
            $rule = ['file' => 'mimes:csv'];
            $validation = Validator::make(['image'=>$file], $rule);
            if (! $validation->passes()) {
                return Redirect::back()->with('flash_message_danger', 'Files mismatch')->withErrors($validation);
            }

            $reader = new Reader($path);

            // Get the column names
            $keys = $reader->fetchOne();
            $reader->setOffset(1);

            // Loop over the rest of data.
            $data = $reader->query();
            foreach ($data as $line_index => $row) {
                // Ignore empty rows
                if (count($row) != 18) {
                    continue;
                }

                // Combine Key with the element
                $record = array_combine($keys, $row);

                $patient = Patient::where('phn', $record['phn'])->first();
                $facility = Facility::where('abbrev', $record['abbrev'])->first();
                $user = User::where('username', $record['username'])->first();

                //If the exist use the id, if not id = 0
                if (is_null($patient)) {
                    //Record must have a patient.
                    continue;
                } else {
                    $patient_id = $patient->id;
                }
                if (is_null($facility)) {
                    $facility_id = 0;
                    $record['abbrev'] = 'IMPORT';
                } else {
                    $facility_id = $facility->id;
                }
                if (is_null($user)) {
                    $user_id = 0;
                    $record['username'] = 'IMPORT';
                } else {
                    $user_id = $user->id;
                }

                //Store validation the data
                $records = new Record;
                if ($records->fill($record)->isValid()) {
                    unset($records['phn']);
                    unset($records['abbrev']);
                    unset($records['username']);

                    $records->patient_id = $patient_id;
                    $records->facility_id = $facility_id;
                    $records->user_id = $user_id;

                    $records->save();
                    $count++;
                } else {
                    return Redirect::back()->with('flash_message_danger', 'Record of ' . $records->phn . ': ' . $records->errors->first());
                }
            }

            return Redirect::route('record.index')->with('flash_message_success', ''.$count.' New entries have been created');
        }

        return Redirect::back()->withErrors('Please select a File');
    }


    public function exportPat()
    {
        // Filter out id and image.
        $patients = Patient::select(['phn', 'name', 'preferred_name', 'sex', 'date_of_birth', 'address', 'postal_code', 'home_phone', 'work_phone', 'mobile_phone', 'email', 'emergency_name', 'emergency_phone', 'emergency_relationship', 'allergies', 'permanent_resident', 'medical_history', 'preferred_language', 'other_language', 'ethnic_background', 'family_doctor'])->get()->toArray();

        $filename = sha1(time().time()).".csv";
        $path = storage_path('files/export/'. $filename);

        $exporter_source = new \Exporter\Source\ArraySourceIterator($patients);

        $exporter_writer = new \Exporter\Writer\CsvWriter($path);

        \Exporter\Handler::create($exporter_source, $exporter_writer)->export();

        // Check if file exist
        if (File::exists($path)) {
            return Response::download($path);
        } else {
            return Redirect::action('PatientController@index')->with('flash_message_danger', 'Export file failed to generate.');
        }
    }


    public function exportRec()
    {
        $records = Record::all();
        foreach ($records as $record) {
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
        if (File::exists($path)) {
            return Response::download($path);
        } else {
            return Redirect::action('RecordController@index')->with('flash_message_danger', 'Export file failed to generate.');
        }
    }
}
