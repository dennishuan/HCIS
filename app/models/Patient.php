<?php

class Patient extends Eloquent{
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'patients';
    protected $id = null;
    public static $errors;

    //Enable mass assignment for the fields.
    protected $fillable = ['phn', 'name', 'preferred_name', 'sex', 'date_of_birth', 'address', 'postal_code', 'home_phone', 'work_phone', 'mobile_phone', 'email', 'emergency_name', 'emergency_phone', 'emergency_relationship', 'allergies', 'permanent_resident', 'medical_history', 'preferred_language', 'other_language', 'ethnic_background', 'family_doctor'];


    public function isValid()
    {
        //Valid the input.
        $this->id = Auth::id();
        $rules = array('phn' => 'required|unique:patients,phn' . $this->id . '|numeric|size:9999999999',
                       'name' => 'required|alpha_spaces|max:255',
                       'preferred_name' => 'required|alpha_spaces|max:255',
                       'sex' => 'required|in:female,male',
                       'date_of_birth' => 'required|date',
                       'address' => 'required|max:255',
                       'postal_code' => 'required|min:6|max:6',
                       'home_phone' => 'between:10,15',
                       'work_phone' => 'between:10,15',
                       'mobile_phone' => 'between:10,15',
                       'email' => 'email|unique:users,email' . $this->id . '|max:255',
                       'emergency_name' => 'alpha_spaces',
                       'emergency_phone' => 'between:10,15',
                       'emergency_relationship' => 'alpha',
                       'allergies' => 'max:255',
                       'permanent_resident' => 'required|boolean',
                       'medical_history' => 'max:255',
                       'preferred_language' => 'required|alpha|max:255',
                       'other_language' => 'alpha|max:255',
                       'ethnic_background' => 'required|alpha|max:255',
                       'family_doctor' => 'alpha_spaces',);
        $validation = Validator::make($this->attributes, $rules);

        if($validation->passes())
        {
            return true;
        }

        $this->errors = $validation->messages();

        return false;
    }

    public function record()
    {
        return $this->hasMany('Record');
    }
}
