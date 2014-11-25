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

			$table->string('phn', 10)->unique(); // string = varchar
			$table->string('name', 255); // full name as stated in care card
			$table->string('preferred_name', 255); // preferred name
			$table->enum('sex', ['female', 'male']); // male = 1, o/w female
			$table->date('date_of_birth');
			$table->string('address', 255); // full address
			$table->string('postal_code', 6); // no spaces
			$table->string('home_phone', 15)->nullable(); // numerical values only
			$table->string('work_phone', 15)->nullable();
			$table->string('mobile_phone', 15)->nullable();
			$table->string('email', 255)->nullable();
			$table->string('emergency_name', 255)->nullable(); // emergency contact name
			$table->string('emergency_phone', 15)->nullable(); // emergency contact number
			$table->string('emergency_relationship', 100)->nullable(); // relationship with the patient
			$table->string('allergies', 255)->nullable();
			$table->boolean('permanent_resident'); // yes = 1; o/w no
			$table->text('medical_history');
			$table->string('preferred_language', 255); // primary language
			$table->string('other_language', 255); // secondary preferred language
			$table->string('ethnic_background', 255);
			$table->string('family_doctor', 255)->nullable();
			$table->string('image')->nullable();

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
