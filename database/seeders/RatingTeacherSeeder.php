<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;
use App\Models\Rating;

class RatingTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for($i=0; $i<30; $i++)
        {
            $random_teacher = Teacher::inRandomOrder()->first();

            $random_rating = Rating::inRandomOrder()->first();

            $random_teacher->ratings()->attach($random_rating);
        }
    }
}
