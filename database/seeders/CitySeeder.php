<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\State;

class CitySeeder extends Seeder
{
    public function run()
    {
        $cities = [
            'Maharashtra' => ['Mumbai', 'Pune', 'Nagpur'],
            'Gujarat' => ['Ahmedabad', 'Surat', 'Vadodara'],
            'West Bengal' => ['Kolkata', 'Howrah'],
            'Tamil Nadu' => ['Chennai', 'Coimbatore'],
            'Karnataka' => ['Bengaluru', 'Mysuru'],
            'Delhi' => ['New Delhi'],
            'Uttar Pradesh' => ['Lucknow', 'Kanpur'],
            'Rajasthan' => ['Jaipur', 'Udaipur'],
            'Bihar' => ['Patna', 'Gaya'],
            'Punjab' => ['Amritsar', 'Ludhiana'],
        ];

        foreach ($cities as $stateName => $cityList) {
            $state = State::where('name', $stateName)->first();

            foreach ($cityList as $cityName) {
                City::create([
                    'name' => $cityName,
                    'state_id' => $state->id
                ]);
            }
        }
    }
}

