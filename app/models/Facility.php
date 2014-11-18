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

    public function search($qs){
        // Init result then start to filter it down.
        $result = $this;

        if(array_key_exists('keyword', $qs)){
            $result = $result->where('abbrev', 'LIKE', '%'.$qs['keyword'].'%')->orwhere('name', 'LIKE', '%'.$qs['keyword'].'%');
        }
        if(array_key_exists('name', $qs)){
            $result = $result->where('name', 'LIKE', '%'.$qs['username'].'%');
        }
        if(array_key_exists('abbrev', $qs)){
            $result = $result->where('abbrev', 'LIKE', '%'.$qs['username'].'%');
        }
        if(array_key_exists('type', $qs)){
            $result = $result->where('type', 'LIKE', '%'.$qs['phone'].'%');
        }
        if(array_key_exists('phone', $qs)){
            $result = $result->where('phone', 'LIKE', '%'.$qs['email'].'%');
        }
        if(array_key_exists('fax', $qs)){
            $result = $result->where('fax', 'LIKE', '%'.$qs['name'].'%');
        }
        if(array_key_exists('address', $qs)){
            $result = $result->where('address', 'LIKE', '%'.$qs['phone'].'%');
        }
        if(array_key_exists('postal_code', $qs)){
            $result = $result->where('postal_code', 'LIKE', '%'.$qs['phone'].'%');
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
        return $this->belongsToMany('User', 'facilities_users');
    }

    public function record()
    {
        return $this->hasMany('Record');
    }
}
