<?php

class FacilityUserTableSeeder extends Seeder {

    public function run()
    {
        $users = User::where('type', 'doctor')->orWhere('type', 'nurse')->get();

        foreach($users as $user)
        {
            DB::table('facilities_users')->insert([
                'facilities_id' => Facility::orderByRaw("RAND()")->first()->id,
                'users_id' => $user->id,
            ]);
        }
    }
}
