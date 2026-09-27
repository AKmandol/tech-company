<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'admin@techcompany.test',
            ],
            [
                'name' => 'System Administrator',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'status' => 'active',
            ]
        );

        User::updateOrCreate(
            [
                'email' => 'editor@techcompany.test',
            ],
            [
                'name' => 'Content Editor',
                'password' => Hash::make('password'),
                'role' => 'editor',
                'status' => 'active',
            ]
        );
    }
}
