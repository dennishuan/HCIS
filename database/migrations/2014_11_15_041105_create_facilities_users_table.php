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
            $table->integer('facility_id')->unsigned();
            $table->integer('user_id')->unsigned();

            // Primary key
            $table->primary(['facility_id', 'user_id']);

            // Foreign key
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
        Schema::drop('facilities_users');
    }

}
