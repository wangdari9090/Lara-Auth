<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::create([
        // 'name' => 'Admin',
        'email' => 'admin@gmail.com',
        // 'role' => 'admin',
        'encrypted_password' => Hash::make('password'),
    ]);
     User::create([
        // 'name' => 'User One',
        'email' => 'userone@gmail.com',
        'encrypted_password' => Hash::make('password'),
    ]);
    }
}
