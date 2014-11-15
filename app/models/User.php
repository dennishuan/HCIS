<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');


    //Enable mass assignment for the fields.
    protected $fillable = ['username', 'password', 'email', 'name', 'phone'];


    public function facilities()
    {
        return $this->belongsToMany('facilities', 'facilities_users');
    }


    public function isAdmin()
    {
        return ($this->attributes['type'] === 'admin');
    }

        public function isDoctor()
    {
        return ($this->attributes['type'] === 'doctor');
    }

        public function isNurse()
    {
        return ($this->attributes['type'] === 'nurse');
    }


}
