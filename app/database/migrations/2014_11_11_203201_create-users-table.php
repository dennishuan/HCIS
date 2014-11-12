<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
            // Default id
            $table->increments('id');

            $table->string('username')->unique();
            $table->string('password');
            $table->enum('type', ['admin', 'doctor', 'nurse']);
            $table->string('email');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('workplace');
            $table->string('work_phone', 20);
            $table->string('cellphone', 20);

            // For remember me option.
            $table->string('remember_token');

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
        Schema::drop('users');
    }

}
