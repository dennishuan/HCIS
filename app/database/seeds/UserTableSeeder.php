<<<<<<< HEAD


=======
>>>>>>> auth
<?php

use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin'),
<<<<<<< HEAD
            'type' => 'admin',
            'email' => 'admin@example.com',
            'first_name' => $faker->firstname,
            'last_name' => $faker->lastname,
            'workplace' => $faker->company,
            'work_phone'=> $faker->phoneNumber,
            'cellphone' => $faker->phoneNumber
=======
            'email' => 'admin@example.com'
>>>>>>> auth
        ]);

        foreach(range(1, 10) as $index)
        {
<<<<<<< HEAD
            $type = ['admin', 'doctor', 'nurse'];

            User::create([
                'username' => $faker->unique()->userName,
                'password' => Hash::make($faker->password),
                'type' => $faker->randomElement($type),
                'email' => $faker->safeEmail,
                'first_name' => $faker->firstname,
                'last_name' => $faker->lastname,
                'workplace' => $faker->company,
                'work_phone'=> $faker->phoneNumber,
                'cellphone' => $faker->phoneNumber
=======
            User::create([
                'username' => $faker->unique()->userName,
                'password' => Hash::make($faker->password),
                'email' => $faker->safeEmail
>>>>>>> auth
            ]);
        }
    }

}
<<<<<<< HEAD

=======
>>>>>>> auth
