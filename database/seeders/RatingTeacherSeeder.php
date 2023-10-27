<?php

namespace Database\Seeders;

use App\Models\Rating;
use App\Models\Teacher;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RatingTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = Teacher::all();
        $ratings = Rating::all();

        foreach ($teachers as $teacher) {
            $numRatings = rand(25, 50);

            for ($i = 0; $i < $numRatings; $i++) {
                $startDate = Carbon::now()->subYears(rand(1, 5));
                $endDate = Carbon::now()->endOfMonth();
                $randomDate = Carbon::createFromTimestamp(mt_rand($startDate->timestamp, $endDate->timestamp));
                $teacher->ratings()->attach($ratings->random()->id, [
                    'created_at' => $randomDate,
                    'updated_at' => $randomDate
                ]);
            }
        }
    }
}
