<?php

class Facility extends \Eloquent {
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'facilities';

    protected $fillable = ['abbrev', 'name', 'type', 'phone', 'fax', 'address', 'postal_code'];


    public static $rules = [
        'abbrev' => 'required|alpha|min:6|max:6',
        'name' => 'required|alpha_spaces|max:255',
        'type' => 'required|in:clinic,hospital',
        'phone' => 'required|between:10,15|valid_phone',
        'fax' => 'required|between:10,15|valid_phone',
        'address' => 'required|max:255',
        'postal_code' => 'required|min:6|max:6'
    ];

    public function search($qs){
        // Init result then start to filter it down.
        $result = $this;

        if(array_key_exists('name', $qs)){
            $result = $result->where('name', 'LIKE', '%'.$qs['name'].'%');
        }
        if(array_key_exists('abbrev', $qs)){
            $result = $result->where('abbrev', 'LIKE', '%'.$qs['abbrev'].'%');
        }
        if(array_key_exists('type', $qs)){
            $result = $result->where('type', 'LIKE', '%'.$qs['type'].'%');
        }
        if(array_key_exists('phone', $qs)){
            $result = $result->where('phone', 'LIKE', '%'.$qs['phone'].'%');
        }
        if(array_key_exists('fax', $qs)){
            $result = $result->where('fax', 'LIKE', '%'.$qs['fax'].'%');
        }
        if(array_key_exists('address', $qs)){
            $result = $result->where('address', 'LIKE', '%'.$qs['address'].'%');
        }
        if(array_key_exists('postal_code', $qs)){
            $result = $result->where('postal_code', 'LIKE', '%'.$qs['postal_code'].'%');
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
