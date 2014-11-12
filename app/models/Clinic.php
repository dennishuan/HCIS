<?php

class Clinic extends Eloquent{
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'clinics';


    //Enable mass assignment for the fields.
    protected $fillable = ['phn', 'doctor', 'clinic_phone', 'clinic_address', 'clinic_postal_code', 'appt_date', 'appt_time', 'name', 'sex', 'date_of_birth', 'phone', 'address', 'postal_code', 'notes'];

}
