<?php

class Patient extends Eloquent{
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'patients';
    public static $errors;

    //Enable mass assignment for the fields.
    protected $fillable = ['phn', 'name', 'preferred_name', 'sex', 'date_of_birth', 'address', 'postal_code', 'home_phone', 'work_phone', 'mobile_phone', 'email', 'emergency_name', 'emergency_phone', 'emergency_relationship', 'allergies', 'permanent_resident', 'medical_history', 'preferred_language', 'other_language', 'ethnic_background', 'family_doctor'];


    public function search($qs){
        // Init result then start to filter it down.
        $result = $this;

        if(array_key_exists('phn', $qs)){
            $result = $result->where('phn', 'LIKE', '%'.$qs['phn'].'%');
        }
        if(array_key_exists('name', $qs)){
            $result = $result->where('name', 'LIKE', '%'.$qs['name'].'%');
        }
        if(array_key_exists('preferred_name', $qs)){
            $result = $result->where('preferred_name', 'LIKE', '%'.$qs['preferred_name'].'%');
        }
        if(array_key_exists('sex', $qs)){
            $result = $result->where('sex', 'LIKE', '%'.$qs['sex'].'%');
        }
        if(array_key_exists('date_of_birth', $qs)){
            $result = $result->where('date_of_birth', 'LIKE', '%'.$qs['date_of_birth'].'%');
        }
        if(array_key_exists('address', $qs)){
            $result = $result->where('address', 'LIKE', '%'.$qs['address'].'%');
        }
        if(array_key_exists('postal_code', $qs)){
            $result = $result->where('postal_code', 'LIKE', '%'.$qs['postal_code'].'%');
        }
        if(array_key_exists('home_phone', $qs)){
            $result = $result->where('home_phone', 'LIKE', '%'.$qs['home_phone'].'%');
        }
        if(array_key_exists('work_phone', $qs)){
            $result = $result->where('work_phone', 'LIKE', '%'.$qs['work_phone'].'%');
        }
        if(array_key_exists('mobile_phone', $qs)){
            $result = $result->where('mobile_phone', 'LIKE', '%'.$qs['mobile_phone'].'%');
        }
        if(array_key_exists('email', $qs)){
            $result = $result->where('email', 'LIKE', '%'.$qs['email'].'%');
        }
        if(array_key_exists('emergency_name', $qs)){
            $result = $result->where('emergency_name', 'LIKE', '%'.$qs['emergency_name'].'%');
        }
        if(array_key_exists('emergency_phone', $qs)){
            $result = $result->where('emergency_phone', 'LIKE', '%'.$qs['emergency_phone'].'%');
        }
        if(array_key_exists('emergency_relationship', $qs)){
            $result = $result->where('emergency_relationship', 'LIKE', '%'.$qs['emergency_relationship'].'%');
        }
        if(array_key_exists('allergies', $qs)){
            $result = $result->where('allergies', 'LIKE', '%'.$qs['allergies'].'%');
        }
        if(array_key_exists('permanent_resident', $qs)){
            $result = $result->where('permanent_resident', 'LIKE', '%'.$qs['permanent_resident'].'%');
        }
        if(array_key_exists('medical_history', $qs)){
            $result = $result->where('medical_history', 'LIKE', '%'.$qs['medical_history'].'%');
        }
        if(array_key_exists('preferred_language', $qs)){
            $result = $result->where('preferred_language', 'LIKE', '%'.$qs['preferred_language'].'%');
        }
        if(array_key_exists('other_language', $qs)){
            $result = $result->where('other_language', 'LIKE', '%'.$qs['other_language'].'%');
        }
        if(array_key_exists('ethnic_background', $qs)){
            $result = $result->where('ethnic_background', 'LIKE', '%'.$qs['ethnic_background'].'%');
        }
        if(array_key_exists('family_doctor', $qs)){
            $result = $result->where('family_doctor', 'LIKE', '%'.$qs['family_doctor'].'%');
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

        $rules = array('phn' => 'required|unique:patients,phn,' . $id . '|numeric|digits:10',
                       'name' => 'required|alpha_spaces|max:255',
                       'preferred_name' => 'required|alpha_spaces|max:255',
                       'sex' => 'required|in:female,male',
                       'date_of_birth' => 'required|date',
                       'address' => 'required|max:255',
                       'postal_code' => 'required|min:6|max:6',
                       'home_phone' => 'between:10,15|valid_phone',
                       'work_phone' => 'between:10,15|valid_phone',
                       'mobile_phone' => 'between:10,15|valid_phone',
                       'email' => 'email|unique:patients,email,' . $id . '|max:255',
                       'emergency_name' => 'alpha_spaces',
                       'emergency_phone' => 'between:10,15|valid_phone',
                       'emergency_relationship' => 'alpha',
                       'allergies' => 'max:255',
                       'permanent_resident' => 'required|boolean',
                       'medical_history' => 'max:255',
                       'preferred_language' => 'required|alpha|max:255',
                       'other_language' => 'alpha|max:255',
                       'ethnic_background' => 'required|alpha|max:255',
                       'family_doctor' => 'alpha_spaces',
                      );


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
