<?php

class SearchController extends \BaseController {

    /**
     * Display a listing of the resource.
     * GET /search
     *
     * @return Response
     */
    public function index()
    {
        $input = Input::all();

        //Search
        if(array_key_exists('model', $input)){
            // Record
            if($input['model'] === 'record'){
                $qs = array_except($input, ['model']);
                //Check if query is empty
                if(!empty($qs)){
                    //If not that set search to true
                    $qs = ['search' => 'true'] + $qs;
                }

                $url = qs_url('record', $qs);

                return Redirect::to($url);
            }
            // Patient
            if($input['model'] === 'patient'){
                $qs = array_except($input, ['model']);
                //Check if query is empty
                if(!empty($qs)){
                    //If not that set search to true
                    $qs = ['search' => 'true'] + $qs;
                }

                $url = qs_url('patient', $qs);

                return Redirect::to($url);
            }
            // User
            if($input['model'] === 'user'){
                $qs = array_except($input, ['model']);
                //Check if query is empty
                if(!empty($qs)){
                    //If not that set search to true
                    $qs = ['search' => 'true'] + $qs;
                }

                $url = qs_url('user', $qs);

                return Redirect::to($url);
            }
            // Facility
            if($input['model'] === 'facility'){
                $qs = array_except($input, ['model']);
                //Check if query is empty
                if(!empty($qs)){
                    //If not that set search to true
                    $qs = ['search' => 'true'] + $qs;
                }

                $url = qs_url('facility', $qs);

                return Redirect::to($url);
            }
        }
        return View::make('search.index');
    }

    /**
     * Store a newly created resource in storage.
     * POST /search
     *
     * @return Response
     */
    public function store()
    {
        //
        $input = Input::all();
        // Remove token
        $input = array_except($input, ['_token']);
        // Remove empty input
        while(($key = array_search('', $input)) !== false) {
            unset($input[$key]);
        }

        $url = qs_url('search', $input);

        // Redirect to /search?{query string}
        return Redirect::to($url);
    }


}

