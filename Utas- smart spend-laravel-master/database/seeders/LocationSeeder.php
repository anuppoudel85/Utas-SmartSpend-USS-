<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            'Sandy Bay',
            'City',
        ];

        foreach ($locations as $location) {
            Location::create([
                'name' => $location,
            ]);
        }
    }
}
