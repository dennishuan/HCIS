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
				'fax' => $faker->numerify('##########x####'),
				'address' => $faker->address,
				'postal_code' => strtoupper ($faker->bothify('#?##?#'))
			]);
		}

		Facility::create([
			'abbrev' => 'IMPORT',
			'name' => 'IMPORT',
			'type' => 'Hospital',
			'phone' => '0000000000',
			'fax' => '0000000000',
			'address' => 'IMPORT',
			'postal_code' => 'IMPORT',
		]);

		FAcility::where('name', 'IMPORT')->update(['id' => 0]);
	}

}
