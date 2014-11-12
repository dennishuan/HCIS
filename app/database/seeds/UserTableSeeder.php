<?php

use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create('en_CA');

        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'type' => 'admin',
            'email' => 'admin@example.com',
            'name' => $faker->name,
            'workplace' => $faker->company,
            'work_phone'=> $faker->phoneNumber,
            'cellphone' => $faker->phoneNumber
        ]);

        foreach(range(1, 10) as $index)
        {
            $type = ['admin', 'doctor', 'nurse'];

            User::create([
                'username' => $faker->unique()->userName,
                'password' => Hash::make($faker->password),
                'type' => $faker->randomElement($type),
                'email' => $faker->safeEmail,
                'name' => $faker->name,
                'workplace' => $faker->company,
                'work_phone'=> $faker->phoneNumber,
                'cellphone' => $faker->phoneNumber
            ]);
        }
    }

}
