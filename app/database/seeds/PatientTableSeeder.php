

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
                'preferred_name' => $faker->name,
                'sex' => $faker->boolean,
                'date_of_birth' => $faker->date,
                'address' => $faker->address,
                'postal_code' => $faker->bothify('#?##?#'),
                'home_phone' => $faker->numerify('##########'),
                'work_phone' => $faker->numerify('##########'),
                'mobile_phone'=> $faker->numerify('##########x####'),
                'email' => $faker->email,
                'emergency_name' => $faker->name,
                'emergency_phone' => $faker->numerify('##########'),
                'emergency_relationship' => $faker->word,
                'allergies' => $faker->word,
                'permanent_resident' => $faker->boolean,
                'medical_history' => $faker->text,
                'preferred_language' => $faker->word,
                'other_language' => $faker->word,
                'ethnic_background' => $faker->word,
                'family_doctor' => $faker->name
            ]);
        }
    }

}
