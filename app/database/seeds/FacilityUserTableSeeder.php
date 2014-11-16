<?php

class FacilityUserTableSeeder extends Seeder {

    public function run()
    {
        $users = User::where('type', 'doctor')->orWhere('type', 'nurse')->get();

        foreach($users as $user)
        {
            DB::table('facilities_users')->insert([
                'facility_id' => Facility::orderByRaw("RAND()")->first()->id,
                'user_id' => $user->id,
            ]);
        }
    }
}
