<?php

class Hospital extends Eloquent{
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'hospitals';


    //Enable mass assignment for the fields.
    protected $fillable = ['phn', 'hospital_abbrev', 'hospital_name', 'reg_date', 'reg_time', 'admit_date', 'admit_time', 'priority', 'stated_compl', 'year', 'chief_compl_code', 'chief_compl', 'arrival_mode', 'name', 'sex', 'date_of_birth', 'phone', 'address', 'postal_code', 'notes', 'family_doctor'];

}
