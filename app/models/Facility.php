<?php

class Facility extends \Eloquent {
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'facilities';

    protected $fillable = ['abbrev', 'name', 'phone', 'fax', 'address', 'postal_code'];


    public static $rules = [
        'abbrev' => 'required',
        'name' => 'required',
        'phone' => 'required',
        'fax' => 'required',
        'address' => 'required',
        'postal_code' => 'required'
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
        return $this->belongsToMany('User', 'facilities_users');
    }

    public function record()
    {
        return $this->hasMany('Record');
    }
}
