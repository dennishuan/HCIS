<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

App::error(function(ModelNotFoundException $e){
	return Response::make('Not Found', 404);
});

class UserController extends \BaseController {


	protected $user;


	public function __construct(User $user)
	{
		$this->beforeFilter('admin', ['only' => ['create', 'store', 'destroy', 'ajax']]);
		$this->beforeFilter('owner', ['only' => ['edit', 'update', 'upload', 'password']]);
		$this->user = $user;
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

		if (Request::ajax()){
			if (array_key_exists('search', $input) && $input['search'] === 'true'){
				// get the rest of query string.
				$qs = array_except($input, ['search']);

				//Search and filter out the data.
				$users =$this->user->where('username', '<>', 'IMPORT')->search($qs)->select(['id', 'username', 'type', 'name', 'email', 'phone'])->get()->toJson();

				return $users;
			}
			else{
				//Show a list of all the user
				$users = $this->user->where('username', '<>', 'IMPORT')->select(['id', 'username', 'type', 'name', 'email', 'phone'])->get()->toJson();

				return $users;
			}
		}

		return View::make('user.index');
	}


	/**
	* Show the form for creating a new resource.
	*
	* @return Response
	*/
	public function create()
	{
		//Show a form to create new user.
		return View::make('user.create');
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
		if( ! $this->user->fill($input)->isValid()){
			return Redirect::back()->withInput()->withErrors($this->user->errors)->with('flash_message_danger', 'Invalid input');
		}

		// Hash the password
		$this->user->password = Hash::make($this->user->password);

		// Deleted the password_confirmation before save
		unset($this->user['password_confirmation']);

		$this->user->save();

		return Redirect::route('user.index')->with('flash_message_success', 'New entry have been created');
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
		$user = $this->user->findOrFail($id);

		return View::make('user.show', ['user' => $user]);
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
		$user = $this->user->findOrFail($id);

		return View::make('user.edit', ['user'=>$user]);
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


		// Filter out the field that certain roles can't mass assgin.
		if(!Auth::user()->isAdmin())
		{
			unset($input['type']);
			unset($input['password']);
		}

		$user = $this->user->findOrFail($id);

		if(! $user->fill($input)->isValid()){
			dd($user->errors);
			return Redirect::back()->withInput()->withErrors($user->errors)->with('flash_message_danger', 'Invalid input');
		}

		$user->save();

		return Redirect::route('user.show', $id)->with('flash_message_success', 'The entry has been updated.');
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
		$this->user->findOrFail($id)->delete();

		return Redirect::route('user.index')->with('flash_message_info', 'The entry has been deleted.');
	}

	public function search(){
		//Makes a URL with query string then redecirts to it.
		$keyword = Input::get('keyword');

		$url = qs_url('user', ['search' => 'true', 'keyword' => $keyword]);

		// Redirect to /user/?search={$keyword}
		return Redirect::to($url)->with('flash_message_success', 'Search completed.');
	}

	public function ajax(){
		$input = Input::all();

		//For mass delete request
		if ($input['action'] === 'delete'){
			foreach ($input['input'] as $users){
				$this->destroy($users['id']);
			}
		}
		return "successfully deleted";
	}

	public function upload($id){
		$user = $this->user->findOrFail($id);

		$image = Input::file('file');

		// If image exists
		if( ! isset($image)){
			return Redirect::back()->with('flash_message_danger', 'Image Required.');
		}

		// If image is over 50kb
		if( $image->getSize() > 50000)
		{
			return Redirect::back()->with('flash_message_danger', '50kb maxium for profile picture.');
		}

		// Validate it is a image.
		$rule = ['image' => 'image'];
		$validation = Validator::make(['image'=>$image], $rule);
		if( ! $validation->passes())
		{
			return Redirect::back()->with('flash_message_danger', 'Files mismatch')->withErrors($validation);
		}

		// Store the profile image.
		$extension = $image->getClientOriginalExtension();
		$filename = sha1(time().time()).".".$extension;

		$path = storage_path('files/profile/'. $filename);

		$upload_success= Image::make($image->getRealPath())->resize('640','600')->save($path);

		if( ! $upload_success)
		{
			return Redirect::back()->with('flash_message_danger', 'Upload Error.');
		}

		//Store the path to the image field.

		$user->image = 'files/profile/'. $filename;

		$user->save();

		return Redirect::back()->with('flash_message_success', 'Upload done.');
	}

	public function password($id)
	{
		//
		$user = $this->user->findOrFail($id);

		return View::make('user.password', ['user'=>$user]);
	}

	public function updatePassword($id)
	{
		//Get input then update
		$input = Input::all();

		$user = $this->user->findOrFail($id);

		//Validate the input
		$rule = ['password' => 'required|max:225|confirmed'];
		$validation = Validator::make($input, $rule);
		if( ! $validation->passes())
		{
			return Redirect::back()->with('flash_message_danger', 'Input error')->withErrors($validation);
		}

		//Check for access
		if (!Auth::user()->isAdmin()){
			//Owner
			$credentials = ['username' => $user->username, 'password' => $input['current_password']];
			if (! Auth::validate($credentials))
			{
				return Redirect::back()->with('flash_message_danger', 'Invalid current password.');
			}
		}
		else
		{
			//Admin
			$credentials = ['username' => Auth::user()->username, 'password' => $input['current_password']];
			if (! Auth::validate($credentials))
			{
				return Redirect::back()->with('flash_message_danger', 'Invalid current password.');
			}
		}

		// Hash the password and save
		$user->password = Hash::make($input['password']);

		$user->save();

		return Redirect::route('user.show', $id)->with('flash_message_success', 'The password has been updated.');
	}

}
