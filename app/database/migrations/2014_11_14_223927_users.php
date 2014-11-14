<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
        {
            // Default index laravel uses.
            $table->increments('id');
            
            $table->string('password', 255);
            $table->string('firstname', 255);
            $table->string('lastname', 255);
            $table->enum('type', ['Admin','Doctor','Nurse']);
            $table->char('cellphone', 15);
            $table->string('email');
            $table->string('doctor');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}