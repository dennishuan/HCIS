<?php

class Record extends \Eloquent {
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'records';

    protected $fillable = ['stated_compl', 'subjective', 'objective', 'assessment', 'prescription', 'remarks', 'plan'];

    public static $rules = [
        'stated_compl' => 'required',
        'subjective' => 'required',
        'objective' => 'required',
        'assessment' => 'required',
        'prescription' => 'required',
        'remarks' => 'required',
        'plan' => 'required'
    ];
	
	public function search($qs)
	{
        // Init result then start to filter it down.
        $result = $this;

        if(array_key_exists('keyword', $qs)){
            $result = $result->where('phn', 'LIKE', '%'.$qs['keyword'].'%')->orwhere('name', 'LIKE', '%'.$qs['keyword'].'%');
        }
        if(array_key_exists('phn', $qs)){
            $result = $result->where('phn', 'LIKE', '%'.$qs['phn'].'%');
        }
        if(array_key_exists('name', $qs)){
            $result = $result->where('name', 'LIKE', '%'.$qs['name'].'%');
        }
        if(array_key_exists('sex', $qs)){
            $result = $result->where('sex', 'LIKE', '%'.$qs['sex'].'%');
        }
        if(array_key_exists('preferred_name', $qs)){
            $result = $result->where('preferred_name', 'LIKE', '%'.$qs['preferred_name'].'%');
        }
        if(array_key_exists('address', $qs)){
            $result = $result->where('address', 'LIKE', '%'.$qs['address'].'%');
        }
        if(array_key_exists('date_of_birth', $qs)){
            $result = $result->where('date_of_birth', 'LIKE', '%'.$qs['date_of_birth'].'%');
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
		if(array_key_exists('postal_code', $qs)){
            $result = $result->where('postal_code', 'LIKE', '%'.$qs['postal_code'].'%');
        }
		if(array_key_exists('emergency_phone', $qs)){
            $result = $result->where('emergency_phone', 'LIKE', '%'.$qs['emergency_phone'].'%');
        }
		if(array_key_exists('emergency_name', $qs)){
            $result = $result->where('emergency_name', 'LIKE', '%'.$qs['emergency_name'].'%');
        }
		if(array_key_exists('emergency_relationship', $qs)){
            $result = $result->where('emergency_relationship', 'LIKE', '%'.$qs['emergency_relationship'].'%');
        }
		if(array_key_exists('allergies', $qs)){
            $result = $result->where('allergies', 'LIKE', '%'.$qs['allergies'].'%');
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
		if(array_key_exists('permanent_resident', $qs)){
            $result = $result->where('permanent_resident', 'LIKE', '%'.$qs['permanent_resident'].'%');
        }
		if(array_key_exists('priority', $qs)){
            $result = $result->where('priority', 'LIKE', '%'.$qs['priority'].'%');
        }
		if(array_key_exists('family_doctor', $qs)){
            $result = $result->where('family_doctor', 'LIKE', '%'.$qs['family_doctor'].'%');
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
