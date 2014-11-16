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
        //Search
        if($keyword = Input::get('search')){
            //Search for the keyword in database
            //Then paginate the result
            //Note paginate replace function such as all() or get()
            $patients = $this->patient->where('phn', 'LIKE', '%'.$keyword.'%')->paginate(20);

            //Return the $patient for view to paginate.
            return View::make('patient.index', ['patients' => $patients, 'keyword' => $keyword]);
        }else{
            return View::make('search.index');
        }
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
        array_shift($input);
        $url = qs_url('search', $input);


        // Redirect to /patient/?search={$keyword}
        return Redirect::to($url);
    }

}

