<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;
use App\Models\Sponsorization;
use Carbon\Carbon;

class SponsorizationTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 15; $i++) {
            $random_teacher = Teacher::inRandomOrder()->first();

            $random_sponsorization = Sponsorization::inRandomOrder()->first();

            $sponsored_start = now();

            $sponsored_until = Carbon::now()->addMonth();

            $random_teacher->sponsorization()->attach($random_sponsorization, [
                'sponsored_start' => $sponsored_start,
                'sponsored_until' => $sponsored_until
            ]);
        }
    }
}
