<?php

class Patient extends Eloquent{
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'patients';


    //Enable mass assignment for the fields.
    protected $fillable = ['personal_health_number', 'first_name', 'last_name' , 'sex', 'date_of_birth', 'address', 'postal_code', 'phone', 'family_doctor'];

}
