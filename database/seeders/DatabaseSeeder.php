<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'fajrin',
            'email' => 'fajrin@gmail.com',
            'password' => 'cukaibea'
        ]);
        User::factory()->create([
            'name' => 'orange water',
            'email' => 'orange@gmail.com',
            'password' => 'cukaiaja'
        ]);
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin'
        ]);
    }
}
