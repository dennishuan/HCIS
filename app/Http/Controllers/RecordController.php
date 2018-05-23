<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

App::error(function (ModelNotFoundException $e) {
    return Response::make('Not Found', 404);
});

class RecordController extends Controller
{


    protected $record;


    public function __construct(Record $record)
    {
        $this->beforeFilter('admin', ['only' => ['destroy', 'ajax']]);
        $this->record = $record;
    }

    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        //If the URL includes query string 'search'
        $input = Input::all();

        if (Request::ajax()) {
            if (array_key_exists('search', $input) && $input['search'] === 'true') {
                // get the rest of query string.
                $qs = array_except($input, ['search']);
                $result = [];

                //Search and filter out the data.
                $records =$this->record->search($qs)->select(['patient_id', 'user_id', 'facility_id', 'id', 'reg_datetime', 'admit_datetime'])
                    ->with(['patient' => function ($query) {
                        $query->select('id', 'phn', 'name', 'preferred_name');
                    }])
                    ->with(['user' => function ($query) {
                        $query->select('id', 'name');
                    }])
                    ->with(['facility' => function ($query) {
                        $query->select('id', 'name');
                    }])->get()->toArray();

                foreach ($records as $record) {
                    $result[] = array_dot($record);
                }

                return Response::json($result);
            } else {
                //Show a list of all the record
                $result = [];

                $records = $this->record->select(['patient_id', 'user_id', 'facility_id', 'id', 'reg_datetime', 'admit_datetime'])
                    ->with(['patient' => function ($query) {
                        $query->select('id', 'phn', 'name', 'preferred_name');
                    }])
                    ->with(['user' => function ($query) {
                        $query->select('id', 'name');
                    }])
                    ->with(['facility' => function ($query) {
                        $query->select('id', 'name');
                    }])->get()->toArray();

                foreach ($records as $record) {
                    $result[] = array_dot($record);
                }

                return Response::json($result);
            }
        }

        return View::make('record.index');
    }


    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        //Show a form to create new record.
        return View::make('record.create');
    }


    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function store()
    {
        //Redirect back to the index after storing.
        $input = Input::all();

        //Validation
        if (! $this->record->fill($input)->isValid()) {
            return Redirect::back()->withInput()->withErrors($this->record->errors)->with('flash_message_danger', 'Invalid input');
        }

        //Store the id of abbrev, username, phn
        $patient_id = Patient::where('phn', $this->record['phn'])->first()->id;
        $facility_id = Facility::where('abbrev', $this->record['abbrev'])->first()->id;
        $user_id = User::where('username', $this->record['username'])->first()->id;

        //Delete fields before save
        unset($this->record['username']);
        unset($this->record['abbrev']);
        unset($this->record['phn']);

        //Set the all the foreign key id value.
        $this->record->patient_id = $patient_id;
        $this->record->facility_id = $facility_id;
        $this->record->user_id = $user_id;

        $this->record->save();

        return Redirect::route('record.index')->with('flash_message_success', 'New entry have been created');
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
        $record = $this->record->findOrFail($id);

        return View::make('record.show', ['record' => $record]);
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
        $record = $this->record->findOrFail($id);

        return View::make('record.edit', ['record'=>$record]);
    }


    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function update($id)
    {
        //Get input then update
        $input = Input::all();


        $record = $this->record->findOrFail($id);

        if (! $record->fill($input)->isValid()) {
            return Redirect::back()->withInput()->withErrors($record->errors)->with('flash_message_danger', 'Invalid input');
        }

        //Delete fields before save
        unset($record['username']);
        unset($record['abbrev']);
        unset($record['phn']);

        $record->save();

        return Redirect::route('record.show', $id)->with('flash_message_success', 'The entry has been updated.');
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
        $this->record->findOrFail($id)->delete();

        return Redirect::route('record.index')->with('flash_message_info', 'The entry has been deleted.');
    }

    public function search()
    {
        //Makes a URL with query string then redecirts to it.
        $keyword = Input::get('keyword');

        $url = qs_url('record', ['search' => 'true', 'keyword' => $keyword]);

        // Redirect to /record/?search={$keyword}
        return Redirect::to($url)->with('flash_message_success', 'Search completed.');
    }

    public function ajax()
    {
        $input = Input::all();

        //For mass delete request
        if ($input['action'] === 'delete') {
            foreach ($input['input'] as $records) {
                $this->destroy($records['id']);
            }
        }
    }


    public function upload($id)
    {

        $files = Input::file('file');


        if (! isset($files['0'])) {
            return Redirect::back()->with('flash_message_danger', 'File Required.');
        }

        foreach ($files as $file) {
            $filename = $id . '-' . $file->getClientOriginalName();
            $path = storage_path('files/record/');

            // Validate the files
            $rule = ['path' => 'unique:files,path' ];

            $input = ['file' => $file, 'path' => 'files/record/' . $filename];

            $validation = Validator::make($input, $rule);


            if (! $validation->passes()) {
                return Redirect::back()->with('flash_message_danger', 'Files mismatch')->withErrors($validation);
            }

            // Store the profile image.
            $upload_success = $file->move($path, $filename);

            if (! $upload_success) {
                return Redirect::back()->with('flash_message_danger', 'Upload Error.');
            }

            //Store the path to the files table.
            Files::create(['record_id' => $id, 'path' => 'files/record/' . $filename]);
        }

        return Redirect::back()->with('flash_message_success', 'Upload done.');
    }
}
