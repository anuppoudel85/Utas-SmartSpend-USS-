<?php

namespace Database\Seeders;

use App\Models\Paper;
use Illuminate\Database\Seeder;

class PaperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Paper::create([
            'user_id'       => 6,
            'paper_type_id' => 1,
            'accepted'      => false,
            'title'         => 'Responsive webpage',
            'abstract'      => 'The paper investigates how to make responsive webpage with modern technology.',
        ]);

        Paper::create([
            'user_id'       => 7,
            'paper_type_id' => 4,
            'accepted'      => true,
            'title'         => 'How to secure your website?',
            'abstract'      => 'The paper analyses the possible cyberattacks and proposes the solutions.',
        ]);

        Paper::create([
            'user_id'       => 8,
            'paper_type_id' => 2,
            'accepted'      => false,
            'title'         => 'Investigation on user experience',
            'abstract'      => 'The purpose of the paper is to understand how to improve the design of the web page for better user experience.',
        ]);
    }
}
