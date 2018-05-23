<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

App::error(function (ModelNotFoundException $e) {
    return Response::make('Not Found', 404);
});

class PatientController extends \BaseController
{


    protected $patient;


    public function __construct(Patient $patient)
    {
        $this->beforeFilter('admin', ['only' => ['destroy', 'ajax']]);
        $this->patient = $patient;
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

                //Search and filter out the data.
                $patients =$this->patient->search($qs)->select(['id', 'phn', 'name', 'preferred_name', 'sex', 'date_of_birth'])->get()->toJson();

                return $patients;
            } else {
                //Show a list of all the patient
                $patients = $this->patient->select(['id', 'phn', 'name', 'preferred_name', 'sex', 'date_of_birth'])->get()->toJson();

                return $patients;
            }
        }

        return View::make('patient.index');
    }


    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        //Show a form to create new patient.
        return View::make('patient.create');
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
        if (! $this->patient->fill($input)->isValid()) {
            return Redirect::back()->withInput()->withErrors($this->patient->errors)->with('flash_message_danger', 'Invalid input');
        }

        $this->patient->save();

        return Redirect::route('patient.index')->with('flash_message_success', 'New entry have been created');
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
        $patient = $this->patient->findOrFail($id);

        return View::make('patient.show', ['patient' => $patient]);
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
        $patient = $this->patient->findOrFail($id);

        return View::make('patient.edit', ['patient'=>$patient]);
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

        $patient = $this->patient->findOrFail($id);

        if (! $patient->fill($input)->isValid()) {
            return Redirect::back()->withInput()->withErrors($patient->errors)->with('flash_message_danger', 'Invalid input');
        }

        $patient->save();

        return Redirect::route('patient.show', $id)->with('flash_message_success', 'The entry has been updated.');
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
        $this->patient->findOrFail($id)->delete();

        return Redirect::route('patient.index')->with('flash_message_info', 'The entry has been deleted.');
    }

    public function search()
    {
        //Makes a URL with query string then redecirts to it.
        $keyword = Input::get('keyword');

        $url = qs_url('patient', ['search' => 'true', 'keyword' => $keyword]);

        // Redirect to /patient/?search={$keyword}
        return Redirect::to($url)->with('flash_message_success', 'Search completed.');
    }

    public function ajax()
    {
        $input = Input::all();

        //For mass delete request
        if ($input['action'] === 'delete') {
            foreach ($input['input'] as $patients) {
                $this->destroy($patients['id']);
            }
        }
        return "successfully deleted";
    }


    public function upload($id)
    {
        $patient = $this->patient->findOrFail($id);

        $image = Input::file('file');

        // If image exists
        if (! isset($image)) {
            return Redirect::back()->with('flash_message_danger', 'Image Required.');
        }

        // If image is over 50kb
        if ($image->getSize() > 50000) {
            return Redirect::back()->with('flash_message_danger', '50kb maxium for profile picture.');
        }

        // Validate it is a image.
        $rule = ['image' => 'image'];
        $validation = Validator::make(['image'=>$image], $rule);
        if (! $validation->passes()) {
            return Redirect::back()->with('flash_message_danger', 'Files mismatch')->withErrors($validation);
        }

        // Store the profile image.
        $extension = $image->getClientOriginalExtension();
        $filename = sha1(time().time()).".".$extension;

        $path = storage_path('files/profile/'. $filename);

        $upload_success= Image::make($image->getRealPath())->resize('640', '600')->save($path);

        if (! $upload_success) {
            return Redirect::back()->with('flash_message_danger', 'Upload Error.');
        }

        //Store the path to the image field.

        $patient->image = 'files/profile/'. $filename;

        $patient->save();

        return Redirect::back()->with('flash_message_success', 'Upload done.');
    }
}
