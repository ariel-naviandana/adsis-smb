<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'User 1',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('pass123'),
            'department' => 'IT',
        ]);

        User::create(attributes: [
            'name' => 'User 2',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('pass123'),
            'department' => 'HR',
        ]);

        User::create([
            'name' => 'User 3',
            'email' => 'user3@gmail.com',
            'password' => Hash::make('pass123'),
            'department' => 'Finance',
        ]);

        User::create([
            'name' => 'User 4',
            'email' => 'user4@gmail.com',
            'password' => Hash::make('pass123'),
            'department' => 'Marketing',
        ]);

        User::create([
            'name' => 'User 5',
            'email' => 'user5@gmail.com',
            'password' => Hash::make('pass123'),
            'department' => 'Operations',
        ]);
    }
}
