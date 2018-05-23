<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function(Blueprint $table)
        {
            // Default index laravel uses.
            $table->increments('id');

            $table->integer('patient_id')->unsigned();
            $table->integer('facility_id')->unsigned();
            $table->integer('user_id')->unsigned(); // Referencing Doctor or nurse

            // Data about the records
            $table->enum('priority', ['1','2','3','4','5','6']); // 1 to 5 for hospital; default 6 for clinics
            $table->dateTime('reg_datetime'); // Registration/Appointment/Check-in
            $table->dateTime('admit_datetime'); // Admittance to ED/Doctor's assessment in clinic
            $table->text('stated_compl'); // Patient's stated complaint
            $table->string('chief_compl'); // Category of illness
            $table->string('chief_compl_code', 24); // Code of chief complaints
            $table->string('arrival_mode', 16)->nullable();  
            $table->text('subjective'); // Subject of the patient's visit
            $table->text('objective');  // Objective of the patient's visit
            $table->text('assessment'); // Doctor/Nurse's assessment/examination
            $table->text('prescription')->nullabe(); // prescription medication
            $table->text('remarks')->nullable(); // Button to click and add remarks
            $table->text('plan')->nullable();    // Doctor/nurse's treatment plan
            
            // Default timestamps
            $table->timestamps();

            // Foreign Key
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('facility_id')->references('id')->on('facilities')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
