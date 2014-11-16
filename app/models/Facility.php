<?php

class Facility extends \Eloquent {
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'facilities';

    protected $fillable = ['name', 'phone', 'fax', 'address', 'postal_code'];


    public static $rules = [
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


    public function users()
    {
        return $this->belongsToMany('users', 'facilities_users');
    }


}
