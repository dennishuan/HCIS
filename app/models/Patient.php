<?php

class Patient extends Eloquent{
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'patients';
	
    public static $errors;	
	
    public static $rules = [
	'phn' => 'required',
	'name' => 'required',
	'sex' => 'required',
	'date_of_birth' => 'required',
	'address' => 'required',
	'postal_code' => 'required',
	'phone' => 'required',
	'family_doctor' => 'required'
    ];
	

    //Enable mass assignment for the fields.
    protected $fillable = ['phn', 'name', 'sex', 'date_of_birth', 'address', 'postal_code', 'phone', 'family_doctor'];

    public static function isValid($data)
    {
	$validation = Validator::make($data, static::$rules);

	if ($validation->passes()) return true;
	

	static::$errors = $validation->messages();
	return false;

   }
}
