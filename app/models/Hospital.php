<?php

class Hospital extends Eloquent{
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'hospitals';


    //Enable mass assignment for the fields.
    protected $fillable = [];

}
