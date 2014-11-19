<?php

class Record extends \Eloquent {
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'records';

    protected $fillable = ['priority', 'reg_datetime', 'admit_datetime', 'stated_compl', 'chief_compl', 'chief_compl_code', 'subjective', 'objective', 'assessment'];

    public static $rules = [
        'priority' => 'required|in:1,2,3,4,5,6',
        'reg_datetime' => 'required|date|timezone',
        'admit_datetime' => 'required|date|timezone',
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
