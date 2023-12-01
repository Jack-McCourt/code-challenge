<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Example User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'), 
        ]);

        User::create([
            'name' => 'Example User 2',
            'email' => 'user2@example.com',
            'password' => Hash::make('password'), 
        ]);
    }
}
