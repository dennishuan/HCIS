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
        'preferred_name' => 'required',
        'sex' => 'required',
        'date_of_birth' => 'required',
        'address' => 'required',
        'postal_code' => 'required',
        'permanent_resident' => 'required',
        'medical_history' => 'required',
        'preferred_language' => 'required',
        'other_language' => 'required',
        'ethnic_background' => 'required',
    ];



    //Enable mass assignment for the fields.
    protected $fillable = ['phn', 'name', 'preferred_name', 'sex', 'date_of_birth', 'address', 'postal_code', 'home_phone', 'work_phone', 'mobile_phone', 'email', 'emergency_name', 'emergency_phone', 'emergency_relationship', 'allergies', 'permanent_resident', 'medical_history', 'preferred_language', 'other_language', 'ethnic_background', 'family_doctor'];


    public function isValid()
    {
        //Valid the input.
        $validation = Validator::make($this->attributes, static::$rules);

        if($validation->passes())
        {
            return true;
        }

        $this->errors = $validation->messages();

        return false;
    }

}
