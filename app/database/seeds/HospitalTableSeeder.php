<?php

use Faker\Factory as Faker;

class HospitalTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create('en_CA');

        $priority = ['1', '2', '3', '4', '5'];

        $patients = Patient::orderByRaw("RAND()")->get();

        foreach($patients as $patient)
        {
            Hospital::create([
                'phn' => $patient->phn,
                'hospital_abbrev' => $faker->lexify('??????'),
                'hospital_name' => $faker->company,
                'reg_date' => $faker->date,
                'reg_time' => $faker->time,
                'admit_date' => $faker->date,
                'admit_time' => $faker->time,
                'priority' => $faker->randomElement($priority),
                'stated_compl' => $faker->text,
                'year' => $faker->year,
                'chief_compl_code' => 'What to put here?',
                'chief_compl' => $faker->text,
                'arrival_mode' => 'What to put here?',
                'name' => $patient->name,
                'sex' => $patient->sex,
                'date_of_birth' => $patient->date_of_birth,
                'phone' => $patient->phone,
                'address' => $patient->address,
                'postal_code' => $patient->postal_code,
                'notes' => $faker->text,
                'family_doctor' => $patient->family_doctor
            ]);
        }
    }

}
