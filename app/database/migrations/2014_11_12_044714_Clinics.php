<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clinics extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Clinics', function(Blueprint $table)
        {
            $table->string('patient_phn')->unsigned();
            $table->foreign('patient_phn', 10)->references('phn')->on('patients')->onDelete->('cascade');
            $table->string('doctor_first_name'); 
            $table->string('doctor_last_name'); 
            $table->date('appt_date');
            $table->time('appt_time');
            $table->string('clinic_phone', 15);
            $table->string('clinic_address');
            $table->text('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Clinics');
        
    }

}