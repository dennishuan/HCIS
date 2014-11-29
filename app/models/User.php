<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	* The database table used by the model.
	*
	* @var string
	*/
	protected $table = 'users';

	/**
	* The attributes excluded from the model's JSON form.
	*
	* @var array
	*/
	protected $hidden = array('password', 'remember_token');

	//Enable mass assignment for the fields.
	protected $fillable = ['username', 'type', 'email', 'name', 'phone'];

	public function search($qs){
		// Init result then start to filter it down.
		$result = $this;

		if(array_key_exists('username', $qs)){
			$result = $result->where('username', 'LIKE', '%'.$qs['username'].'%');
		}
		if(array_key_exists('type', $qs)){
			$result = $result->where('type', 'LIKE', '%'.$qs['type'].'%');
		}
		if(array_key_exists('email', $qs)){
			$result = $result->where('email', 'LIKE', '%'.$qs['email'].'%');
		}
		if(array_key_exists('name', $qs)){
			$result = $result->where('name', 'LIKE', '%'.$qs['name'].'%');
		}
		if(array_key_exists('phone', $qs)){
			$result = $result->where('phone', 'LIKE', '%'.$qs['phone'].'%');
		}

		return $result;
	}


	public function isValid()
	{
		//Valid the input.
		$id = null;

		if(array_key_exists('id', $this->attributes)){
			$id = $this->attributes['id'];
		}

		$rules = array(
			'email' => 'required|email|unique:users,email,' . $id . '|max:255',
			'type' => 'required|in:Admin,Doctor,Nurse',
			'name' => 'required|alpha_spaces|max:255',
			'phone' => 'required|between:10,15',
			'username' => 'required|alpha_num|unique:users,username,' . $id . '|max:255',
		);

		$validation = Validator::make($this->attributes, $rules);

		if($validation->passes())
		{
			return true;
		}

		$this->errors = $validation->messages();

		return false;
	}

	public function checkPassword($current_password)
	{
		return $this->password == $current_password;
	}

	public function facility()
	{
		$this->belongsToMany('Facility', 'facilities_users');
	}

	public function record()
	{
		return $this->hasMany('Record');
	}


	public function isAdmin()
	{
		return ($this->attributes['type'] === 'Admin');
	}

	public function isDoctor()
	{
		return ($this->attributes['type'] === 'Doctor');
	}

	public function isNurse()
	{
		return ($this->attributes['type'] === 'Nurse');
	}

	public function getId($id)
	{
		return ($this->attributes['id'] === $id);
	}
}
