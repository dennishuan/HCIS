<?php

class PhotoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	 $id = Input::get('id');
	 $patient = Patient::find($id);
	 return View::make('photo.index', ['patient' => $patient]);
		//
	}


	public function upload()
	{
	 if(Input::hasFile('image'))
	 {	  

	  $image = Input::file('image');

	  $filename = $image->getClientOriginalName();

	  $path = public_path('img/'.$filename);

	  $photo = new Photo();
	  $photo->ref = Input::get('ref');
	  $photo->image = $path;
	  if(Image::make($image->getRealPath())->resize('280','200')->save($path) && $photo->save())
	   {
		return View::make('photo.show');
	   }
		
	  return('error with upload');
	 }

	 return Redirect::back()->withErrors('Please select an Image');
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	 
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
	}


}
