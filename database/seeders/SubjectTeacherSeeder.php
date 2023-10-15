<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;
use App\Models\Subject;


class SubjectTeacherSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for($i=0; $i<20; $i++)
        {
            $random_teacher = Teacher::inRandomOrder()->first();

            $random_subject = Subject::inRandomOrder()->first();

            $random_teacher->subjects()->attach($random_subject);
        }
    }
}
