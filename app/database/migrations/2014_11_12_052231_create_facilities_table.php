<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitiesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilities', function(Blueprint $table)
        {

            // Default index laravel uses.
            $table->increments('id');

            $table->string('facility_abbrev', 6);
            $table->string('facility_name', 255);
            $table->enum('facilitytype', ['Hospital','Clinic']);
            $table->string('phone', 15);
            $table->string('fax', 15);
            $table->string('address');
            $table->string('postal_code', 6);
            
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
        Schema::drop('facilities');
    }

}
