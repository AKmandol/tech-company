<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,

            SettingSeeder::class,

            ServiceSeeder::class,

            ProjectSeeder::class,

            TeamSeeder::class,

            ClientSeeder::class,

            CareerSeeder::class,

            BlogSeeder::class,

            ContactSubmissionSeeder::class,

            MediaSeeder::class,
        ]);
    }
}
