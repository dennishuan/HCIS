

<?php

use Faker\Factory as Faker;

class PatientTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 100) as $index)
        {
            Patient::create([

                'phn' => $faker->unique()->numberBetween(1000000000, 9999999999),
                'name' => $faker->name,
                'sex' => $faker->boolean,
                'date_of_birth' => $faker->date,
                'address' => $faker->address,
                'postal_code' => $faker->postcode,
                'phone' => $faker->phoneNumber,
                'family_doctor' => $faker->name

            ]);
        }
    }

}
