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
                'facility_abbrev' => $faker->lexify('??????'),
                'facility_name' => $faker->company,
                'facilitytype' => $faker->randomElement($type),
                'phone' => $faker->numerify('##########x####'),
                'address' => $faker->address,
                'postal_code' => strtoupper ($faker->bothify('#?##?#'))
            ]);
        }
    }

}
