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

    public static $rules = [
        'username' => 'required',
        'password' => 'required',
        'email' => 'required',
        'name' => 'required',
        'phone' => 'required',
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


    public function facility()
    {
        return $this->belongsToMany('Facility', 'facilities_users');
    }

    public function record()
    {
        return $this->hasMany('Record');
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
