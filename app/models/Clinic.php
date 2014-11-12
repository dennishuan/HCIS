<?php

class Clinic extends Eloquent{
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'clinics';


    //Enable mass assignment for the fields.
    protected $fillable = [];

}
