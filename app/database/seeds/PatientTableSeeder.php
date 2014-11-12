

<?php

use Faker\Factory as Faker;

class PatientTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create('en_CA');

        foreach(range(1, 100) as $index)
        {
            Patient::create([

                'phn' => $faker->unique()->numerify('##########'),
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
