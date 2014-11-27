<?php

class FacilityUserTableSeeder extends Seeder {

    public function run()
    {
        $users = User::where('type', 'Doctor')->orWhere('type', 'Nurse')->get();

        foreach($users as $user)
        {
            $facility = Facility::orderByRaw("RAND()")->take(2)->get();
            DB::table('facilities_users')->insert([
                'facility_id' => $facility[0]->id,
                'user_id' => $user->id,
            ]);
            if (rand(0, 1)){
                DB::table('facilities_users')->insert([
                    'facility_id' => $facility[1]->id,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
