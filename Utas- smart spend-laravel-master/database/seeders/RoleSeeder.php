<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Chair',
            'Organiser',
            'Reviewer',
            'Author',
        ];

        foreach ($roles as $role) {
            Role::create([
                'description' => $role,
            ]);
        }
    }
}
