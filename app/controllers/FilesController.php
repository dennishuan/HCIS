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

    //export all patients currently to patients.jon in public
    public function exportPat()
    {
        $patients = Patient::all();
        $file = new FileSystem();
        $filename = sha1(time().time()).".json";
        $path = storage_path('files/export/'. $filename);
        $file->put($path, $patients);
        return Response::download($path);
    }

    //export all records to records.json
    public function exportRec()
    {
        $records = Record::all();
        $file = new FileSystem();
        $filename = sha1(time().time()).".json";
        $path = storage_path('files/export/'. $filename);
        $file->put($path, $records);
        return Response::download($path);
    }



}
