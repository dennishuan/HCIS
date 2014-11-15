<?php

class Facility extends \Eloquent {
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'facilities';

    protected $fillable = [];


        public function users()
    {
        return $this->belongsToMany('users', 'facilities_users');
    }


}
