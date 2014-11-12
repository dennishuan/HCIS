<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function(Blueprint $table)
        {
            // Default index laravel uses.
            $table->increments('id');

            $table->string('phn', 10)->unique();
            $table->string('doctor');
            $table->string('clinic_phone', 20);
            $table->string('clinic_address');
            $table->string('clinic_postal_code', 10);
            $table->date('appt_date');
            $table->time('appt_time');
            $table->string('name');
            $table->boolean('sex');
            $table->date('date_of_birth');
            $table->string('phone', 20);
            $table->string('address');
            $table->string('postal_code', 10);
            $table->string('notes');

            // Default timestamps
            $table->timestamps();

            // Foreign Key
            $table->foreign('phn')->references('phn')->on('hospitals')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clinics');
    }

}
