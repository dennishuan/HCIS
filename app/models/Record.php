<?php

class Record extends \Eloquent {
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'records';

    protected $fillable = ['priority', 'reg_datetime', 'admit_datetime', 'chief_compl', 'chief_compl_code', 'stated_compl', 'subjective', 'objective', 'assessment', 'prescription', 'arrival_mode', 'remarks', 'plan', 'phn', 'abbrev', 'username'];

    public static $rules = [
        'phn' => 'required|exists:patients,phn',
        'abbrev' => 'required|exists:facilities,abbrev',
        'username' => 'required|exists:users,username,type,doctor',
        'priority' => 'required|in:1,2,3,4,5,6',
        'reg_datetime' => 'required|date|date_time',
        'admit_datetime' => 'required|date|date_time',
        'chief_compl' => 'required',
        'chief_compl_code' => 'required',
        'stated_compl' => 'required',
        'subjective' => 'required',
        'objective' => 'required',
        'assessment' => 'required',
    ];

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

    public function search($qs)
    {
        // Init result then start to filter it down.
        $result = $this;

        // User filter
        $result = $result->whereHas('user', function($user) use ($qs){
            if(array_key_exists('doctor', $qs)){
                $user = $user->where('name', 'LIKE', '%'.$qs['doctor'].'%');
            }
        });

        // Facility filter
        $result = $result->whereHas('facility', function($facility) use ($qs){
            if(array_key_exists('facility', $qs)){
                $facility = $facility->where('name', 'LIKE', '%'.$qs['facility'].'%');
            }
        });

        // Patient Filter
        $result = $result->whereHas('patient', function($patient) use ($qs){

            if(array_key_exists('phn', $qs)){
                //Find the patients with phn
                $patient = $patient->where('phn', 'LIKE', '%'.$qs['phn'].'%');
            }
            if(array_key_exists('name', $qs)){
                $patient = $patient->where('name', 'LIKE', '%'.$qs['name'].'%');
            }
            if(array_key_exists('sex', $qs)){
                $patient = $patient->where('sex', 'LIKE', '%'.$qs['sex'].'%');
            }
            if(array_key_exists('preferred_name', $qs)){
                $patient = $patient->where('preferred_name', 'LIKE', '%'.$qs['preferred_name'].'%');
            }
            if(array_key_exists('address', $qs)){
                $patient = $patient->where('address', 'LIKE', '%'.$qs['address'].'%');
            }
            if(array_key_exists('date_of_birth', $qs)){
                $patient = $patient->where('date_of_birth', 'LIKE', '%'.$qs['date_of_birth'].'%');
            }
            if(array_key_exists('home_phone', $qs)){
                $patient = $patient->where('home_phone', 'LIKE', '%'.$qs['home_phone'].'%');
            }
            if(array_key_exists('work_phone', $qs)){
                $patient = $patient->where('work_phone', 'LIKE', '%'.$qs['work_phone'].'%');
            }
            if(array_key_exists('mobile_phone', $qs)){
                $patient = $patient->where('mobile_phone', 'LIKE', '%'.$qs['mobile_phone'].'%');
            }
            if(array_key_exists('postal_code', $qs)){
                $patient = $patient->where('postal_code', 'LIKE', '%'.$qs['postal_code'].'%');
            }
            if(array_key_exists('emergency_phone', $qs)){
                $patient = $patient->where('emergency_phone', 'LIKE', '%'.$qs['emergency_phone'].'%');
            }
            if(array_key_exists('emergency_name', $qs)){
                $patient = $patient->where('emergency_name', 'LIKE', '%'.$qs['emergency_name'].'%');
            }
            if(array_key_exists('emergency_relationship', $qs)){
                $patient = $patient->where('emergency_relationship', 'LIKE', '%'.$qs['emergency_relationship'].'%');
            }
            if(array_key_exists('allergies', $qs)){
                $patient = $patient->where('allergies', 'LIKE', '%'.$qs['allergies'].'%');
            }
            if(array_key_exists('preferred_language', $qs)){
                $patient = $patient->where('preferred_language', 'LIKE', '%'.$qs['preferred_language'].'%');
            }
            if(array_key_exists('other_language', $qs)){
                $patient = $patient->where('other_language', 'LIKE', '%'.$qs['other_language'].'%');
            }
            if(array_key_exists('ethnic_background', $qs)){
                $patient = $patient->where('ethnic_background', 'LIKE', '%'.$qs['ethnic_background'].'%');
            }
            if(array_key_exists('permanent_resident', $qs)){
                $patient = $patient->where('permanent_resident', 'LIKE', '%'.$qs['permanent_resident'].'%');
            }
            if(array_key_exists('family_doctor', $qs)){
                $patient = $patient->where('family_doctor', 'LIKE', '%'.$qs['family_doctor'].'%');
            }
        });

        if(array_key_exists('priority', $qs)){
            $result = $result->where('priority', 'LIKE', '%'.$qs['priority'].'%');
        }
        if(array_key_exists('reg_datetime', $qs)){
            $result = $result->where('reg_datetime', 'LIKE', '%'.$qs['reg_datetime'].'%');
        }
        if(array_key_exists('admit_datetime', $qs)){
            $result = $result->where('admit_datetime', 'LIKE', '%'.$qs['admit_datetime'].'%');
        }
        if(array_key_exists('arrival_mode', $qs)){
            $result = $result->where('arrival_mode', 'LIKE', '%'.$qs['arrival_mode'].'%');
        }
        if(array_key_exists('chief_compl_code', $qs)){
            $result = $result->where('chief_compl_code', 'LIKE', '%'.$qs['chief_compl_code'].'%');
        }
        return $result;
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function facility()
    {
        return $this->belongsTo('Facility');
    }

    public function patient()
    {
        return $this->belongsTo('Patient');
    }


}
