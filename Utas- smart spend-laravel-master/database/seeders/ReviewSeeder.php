<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::create([
            'user_id'  => 4,
            'paper_id' => 2,
            'result'   => 4,
        ]);

        Review::create([
            'user_id'  => 5,
            'paper_id' => 1,
            'result'   => 2,
        ]);

        Review::create([
            'user_id'  => 5,
            'paper_id' => 3,
            'result'   => 1,
        ]);

        Review::create([
            'user_id'  => 4,
            'paper_id' => 1,
            'result'   => 1,
        ]);
    }
}
