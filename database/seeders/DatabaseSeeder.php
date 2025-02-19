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
    // public function run(): void
    // {
    //     // User::factory(10)->create();

    //     User::factory()->create([
    //         'name' => 'User',
    //         'email' => 'test@gmail.com',
    //     ]);
    // }
}

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

Admin::create([
    'username' => 'admin',
    'password' => Hash::make('admin123'),
]);
