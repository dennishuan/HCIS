<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hospitals extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Hospitals', function(Blueprint $table)
        {
            $table->increments('patient_id')->unique();
            $table->string('phn', 10)->unique();
            $table->string('hospital_id', 3); 
            $table->string('hospital_name');
            $table->string('hospital_abbrev');
            $table->date('reg_date');
            $table->time('reg_time');
            $table->date('admit_date');
            $table->time('admit_time');
            $table->enum('priority', array('1','2','3','4','5'));
            $table->string('chief_compl_code', 10);
            $table->string('chief_compl');
            $table->string('stated_compl');
            $table->text('notes');
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
        Schema::drop('Hospitals');
    }

}
