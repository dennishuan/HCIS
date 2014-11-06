<?php

use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'email' => 'admin@example.com'
        ]);

        foreach(range(1, 10) as $index)
        {
            User::create([
                'username' => $faker->unique()->userName,
                'password' => Hash::make($faker->password),
                'email' => $faker->safeEmail
            ]);
        }
    }

}
