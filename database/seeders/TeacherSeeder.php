<?php
//Cos'è lo slug?
namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = config('teachers');

        foreach($teachers as $teacher) {
            
            $random_user = User::inRandomOrder()->first()->id;

            Teacher::create([
                'user_id' => $random_user,
                'bio' => $teacher['bio'],
                'cv' => 'uploads/documents/'.$teacher['cv'],
                'photo' => 'uploads/images/'.$teacher['photo'],
                'phone' => $teacher['phone'],
                'service' => $teacher['service']
            ]);

        }
    }
}
