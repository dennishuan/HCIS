<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function(Blueprint $table)
        {
            // Default index laravel uses.
            $table->increments('id');

            $table->integer('patients_id')->unsigned();
            $table->integer('facilities_id')->unsigned();
            $table->integer('users_id')->unsigned(); // ReferencingDoctor

            // Data about the records
            $table->date('reg_date');
            $table->time('reg_time');
            $table->date('admit_date');
            $table->time('admit_time');
            $table->enum('priority', ['1','2','3','4','5']);
            $table->text('stated_compl');
            $table->string('year', 4);
            $table->string('chief_compl_code', 24);
            $table->string('chief_compl');
            $table->string('arrival_mode', 16);
            $table->text('notes')->nullable();

            // Default timestamps
            $table->timestamps();

            // Foreign Key
            $table->foreign('patients_id')->references('id')->on('patients')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('records');
    }

}
