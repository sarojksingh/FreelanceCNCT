<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // Prevent duplicate admin creation
            [
                'name' => 'Admin User',
                'password' => Hash::make('admin123'), // Use a strong password
                'role' => 'admin',
            ]
        );
    }
}
