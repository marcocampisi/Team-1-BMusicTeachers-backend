<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Review;
use App\Models\Sponsorization;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            TeacherSeeder::class,
            MessageSeeder::class,
            RatingSeeder::class,
            SponsorizationSeeder::class,
            SubjectSeeder::class,
            ReviewSeeder::class,
          ]);
    }
}
