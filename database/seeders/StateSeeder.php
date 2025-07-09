<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;
use App\Models\Country;

class StateSeeder extends Seeder
{
    public function run()
    {
        $country = Country::where('code', 'IN')->first();

        $states = [
            'Maharashtra',
            'Gujarat',
            'West Bengal',
            'Tamil Nadu',
            'Karnataka',
            'Delhi',
            'Uttar Pradesh',
            'Rajasthan',
            'Bihar',
            'Punjab'
        ];

        foreach ($states as $state) {
            State::create([
                'name' => $state,
                'country_id' => $country->id
            ]);
        }
    }
}
