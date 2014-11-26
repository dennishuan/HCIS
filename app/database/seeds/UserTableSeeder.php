<?php

use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create('en_CA');

		$type = ['admin', 'doctor', 'nurse'];

		User::create([
			'username' => 'admin',
			'password' => Hash::make('admin'),
			'type' => 'admin',
			'email' => 'admin@example.com',
			'name' => $faker->name,
			'phone' => $faker->numerify('##########')
		]);

		User::create([
			'username' => 'doctor',
			'password' => Hash::make('doctor'),
			'type' => 'doctor',
			'email' => 'doctor@example.com',
			'name' => $faker->name,
			'phone' => $faker->numerify('##########')
		]);

		User::create([
			'username' => 'nurse',
			'password' => Hash::make('nurse'),
			'type' => 'nurse',
			'email' => 'nurse@example.com',
			'name' => $faker->name,
			'phone' => $faker->numerify('##########')
		]);

		foreach(range(1, 30) as $index)
		{

			User::create([
				'username' => $faker->unique()->userName,
				'password' => Hash::make($faker->password),
				'type' => $faker->randomElement($type),
				'email' => $faker->safeEmail,
				'name' => $faker->name,
				'phone' => $faker->numerify('##########')
			]);
		}

		User::create([
			'username' => 'IMPORT',
			'password' => Hash::make('IMPORT'),
			'type' => 'doctor',
			'email' => 'import@example.com',
			'name' => 'IMPORT',
			'phone' => '0000000000'
		]);

		User::where('username', 'IMPORT')->update(['id' => 0]);
	}

}
