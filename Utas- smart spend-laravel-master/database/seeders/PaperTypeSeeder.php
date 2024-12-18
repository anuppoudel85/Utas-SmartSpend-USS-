<?php

namespace Database\Seeders;

use App\Models\PaperType;
use Illuminate\Database\Seeder;

class PaperTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaperType::create([
            'name'        => 'Paper',
            'location_id' => 1,
        ]);

        PaperType::create([
            'name'        => 'Poster',
            'location_id' => 1,
        ]);

        PaperType::create([
            'name'        => 'Doctorial Consortium',
            'location_id' => 1,
        ]);

        PaperType::create([
            'name'        => 'Working Group',
            'location_id' => 2,
        ]);

        PaperType::create([
            'name'        => 'Tips, Techniques and Courseware',
            'location_id' => 2,
        ]);
    }
}
