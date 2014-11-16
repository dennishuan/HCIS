<?php

use Faker\Factory as Faker;

class FacilityTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create('en_CA');

        $type = ['Hospital','Clinic'];

        foreach(range(1, 8) as $index)
        {
            Facility::create([
                'abbrev' => $faker->lexify('??????'),
                'name' => $faker->company,
                'type' => $faker->randomElement($type),
                'phone' => $faker->numerify('##########x####'),
                'address' => $faker->address,
                'postal_code' => strtoupper ($faker->bothify('#?##?#'))
            ]);
        }
    }

}
