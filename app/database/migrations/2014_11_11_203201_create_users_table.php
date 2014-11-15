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
            // Default index laravel uses.
            $table->increments('id');

            $table->string('username')->unique();
            $table->string('password');
            $table->enum('type', ['admin', 'doctor', 'nurse']);
            $table->string('name');
            $table->string('email');
            $table->string('phone', 15);

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
