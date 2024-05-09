<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call UserSeeder
        $this->call(UserSeeder::class);

        // Call ArticleSeeder
        $this->call(ArticleSeeder::class);
    }
}
