<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Patients extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function(Blueprint $table)
        {
            // Default index laravel uses.
            $table->increments('id'); // records id 
            
            $table->text('subjective'); // Subject of the patient's visit
            $table->text('objective');  // Objective of the patient's visit
            $table->text('assessment'); // Doctor/Nurse's notes on the assessment
            $table->dateTime('datetime_of_appointment'); 
            $table->text('remarks'); // additional notes (a button to click and add a note')
            $table->text('plan'); // doctor/nurse's plan for treatment;
            
            // foreign key
            $table->foreign('phn')->references('phn')->on('patients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('doctor')->references('doctor')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('facility_id')->references('facility_id')->on('facility')->onDelete('cascade')->onUpdate('cascade'); // facility_id is the id of the hospital/clinic in facility table
        });
            // Default timestamps
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
        Schema::drop('records');
    }

}
