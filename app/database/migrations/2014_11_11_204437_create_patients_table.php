<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration {

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
            $table->increments('id');

            $table->string('phn', 10)->unique();
            $table->string('first_name');
	    $table->string('last_name');
            $table->boolean('sex');
            $table->date('date_of_birth');
            $table->string('address');
            $table->string('postal_code', 10);
            $table->string('phone', 20);
            $table->string('family_doctor');

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
        Schema::drop('patients');
    }

}
