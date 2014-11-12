<?php

use Faker\Factory as Faker;

class ClinicTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create('en_CA');

        $patients = Patient::orderByRaw("RAND()")->get();

        foreach($patients as $patient)
        {
            Clinic::create([

                'phn' => $patient->phn,
                'doctor' => $faker->name,
                'clinic_phone' => $faker->phoneNumber,
                'clinic_address' => $faker->address,
                'clinic_postal_code' => $faker->postcode,
                'appt_date' => $faker->date,
                'appt_time' => $faker->time,
                'name' => $patient->name,
                'sex' => $patient->sex,
                'date_of_birth' => $patient->date_of_birth,
                'phone' => $patient->phone,
                'address' => $patient->address,
                'postal_code' => $patient->postal_code,
                'notes' => $faker->text,

            ]);
        }
    }

}
