<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function(Blueprint $table)
        {
            // Default index laravel uses.
            $table->increments('id');

            $table->string('phn', 10)->unique();
            $table->string('hospital_abbrev', 6);
            $table->string('hospital_name');
            $table->date('reg_date');
            $table->time('reg_time');
            $table->date('admit_date');
            $table->time('admit_time');
            $table->string('priority', 1);
            $table->text('stated_compl');
            $table->string('year', 4);
            $table->string('chief_compl_code', 50);
            $table->string('chief_compl');
            $table->string('arrival_mode', 16);
            $table->string('name');
            $table->boolean('sex');
            $table->date('date_of_birth');
            $table->string('phone', 20);
            $table->string('address');
            $table->string('postal_code', 10);
            $table->longtext('notes');
            $table->string('family_doctor');

            // Default timestamps
            $table->timestamps();

            // Foreign Key
            $table->foreign('phn')->references('phn')->on('patients')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hospitals');
    }

}
