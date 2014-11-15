<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitiesUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilities_users', function(Blueprint $table)
        {
            // Many to Many relation bewteen failities and doctors
            // Facilities can have many doctors.
            // Doctors can work at many facilities.
            $table->integer('facilities_id')->unsigned();
            $table->integer('users_id')->unsigned();

            // Primary key
            $table->primary(['facilities_id', 'users_id']);

            // Foreign key
            $table->foreign('facilities_id')->references('id')->on('facilities')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('facilities_users');
    }

}
