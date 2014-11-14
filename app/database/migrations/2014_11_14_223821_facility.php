<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Facility extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('facility', function($table)
        {
            // Default index laravel uses.
            $table->increments('id');
            
            $table->string('phn', 10)->unique();
            $table->enum('facilitytype', ['Hospital','Clinic'];
            $table->string('addrev', 6);
            $table->string('name', 255);
            $table->date('reg_date');
            $table->time('reg_time');
            $table->date('admit_date');
            $table->time('admit_time');
            $table->enum('priority', ['1','2','3','4','5']);
            $table->text('stated_compl');
            $table->year('year', 4);
            $table->string('chief_compl_code', 50);
            $table->string('chief_compl', 255);
            $table->string('arrivalmode', 16);
            $table->char('facilityphone', 15);
            $table->text('notes');
            
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('facility');
	}

}