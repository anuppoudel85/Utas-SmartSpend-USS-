<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'        => 'Katherine Siva',
            'role_id'     => 1,
            'email'       => 'ks@test.com',
            'password'    => bcrypt('password'),
            'affiliation' => 'UTAS',
        ]);

        User::create([
            'name'        => 'Sue Benitez',
            'role_id'     => 2,
            'email'       => 'sb@test.com',
            'password'    => bcrypt('password'),
            'affiliation' => 'UNSW',
        ]);

        User::create([
            'name'        => 'Ladonna Gregory',
            'role_id'     => 2,
            'email'       => 'lg@test.com',
            'password'    => bcrypt('password'),
            'affiliation' => 'RMIT',
        ]);

        User::create([
            'name'        => 'Virginia Butler',
            'role_id'     => 3,
            'email'       => 'vb@test.com',
            'password'    => bcrypt('password'),
            'affiliation' => 'UQ',
        ]);

        User::create([
            'name'        => 'Ronda Hull',
            'role_id'     => 3,
            'email'       => 'rh@test.com',
            'password'    => bcrypt('password'),
            'affiliation' => 'UTS',
        ]);

        User::create([
            'name'        => 'Collin Cook',
            'role_id'     => 4,
            'email'       => 'col@test.com',
            'password'    => bcrypt('password'),
            'affiliation' => 'UTAS',
        ]);

        User::create([
            'name'        => 'Roma Mitchell',
            'role_id'     => 4,
            'email'       => 'rm@test.com',
            'password'    => bcrypt('password'),
            'affiliation' => 'UQ',
        ]);

        User::create([
            'name'        => 'Alexa Town',
            'role_id'     => 4,
            'email'       => 'at@test.com',
            'password'    => bcrypt('password'),
            'affiliation' => 'ANU',
        ]);
    }
}
