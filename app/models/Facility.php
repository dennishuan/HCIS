<?php

class Facility extends \Eloquent {
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'facilities';

    protected $fillable = ['abbrev', 'name', 'type', 'phone', 'fax', 'address', 'postal_code'];

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
         $id = null;

        if(array_key_exists('id', $this->attributes)){
            $id = $this->attributes['id'];
        }

        $rules = array(
            'abbrev' => 'required|alpha|min:3|max:6|unique:facilities,abbrev,' . $id,
            'name' => 'required|alpha_spaces|max:255|unique:facilities,name,' . $id,
            'type' => 'required|in:Clinic,Hospital',
            'phone' => 'required|between:10,15|valid_phone|unique:facilities,phone,' . $id,
            'fax' => 'required|between:10,15|valid_phone|unique:facilities,fax,' . $id,
            'address' => 'required|max:255|unique:facilities,address,' . $id,
            'postal_code' => 'required|min:6|max:6|unique:facilities,postal_code,' . $id,
        );
        
        $validation = Validator::make($this->attributes, $rules);

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
