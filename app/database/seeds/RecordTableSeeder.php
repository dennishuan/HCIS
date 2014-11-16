<?php

use Faker\Factory as Faker;

class RecordTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create('en_CA');

        $priority = ['1', '2', '3', '4', '5'];

        $patients = Patient::all();
        $facilities = Facility::all();
        $users = User::where('type', 'doctor');

        foreach(range(1, 300) as $index)
        {
            Record::create([
                'patient_id' => Patient::orderByRaw("RAND()")->first()->id,
                'facility_id' => Facility::orderByRaw("RAND()")->first()->id,
                'user_id' => User::orderByRaw("RAND()")->first()->id,

                'reg_date' => $faker->date,
                'reg_time' => $faker->time,
                'admit_date' => $faker->date,
                'admit_time' => $faker->time,
                'priority' => $faker->randomElement($priority),
                'stated_compl' => $faker->text,
                'year' => $faker->year,
                'chief_compl_code' => $faker->word,
                'chief_compl' => $faker->sentence,
                'arrival_mode' => $faker->word,
                'notes' => $faker->text
            ]);
        }
    }

}
