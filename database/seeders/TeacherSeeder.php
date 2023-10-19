<?php
//Cos'è lo slug?
namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Helpers
use Illuminate\Support\Facades\Schema;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         //
        Schema::withoutForeignKeyConstraints(function(){
            Teacher::truncate();
        });

        $teachers = config('teachers');

        $uniqueUserIds = User::inRandomOrder()->pluck('id')->unique();
        
        foreach($teachers as $teacher) {
            
            if ($uniqueUserIds->count() === 0) {
                $uniqueUserIds = User::inRandomOrder()->pluck('id')->unique();
            }
        
            $user_id = $uniqueUserIds->shift();
        
            $teacher = Teacher::create([
                'user_id' => $user_id,
                'bio' => $teacher['bio'],
                'cv' => 'uploads/documents/' . $teacher['cv'],
                'photo' => 'uploads/images/' . $teacher['photo'],
                'phone' => $teacher['phone'],
                'service' => $teacher['service'],
            ]);

            $user = User::find($user_id);
            $user->teacher_id = $teacher->id;
            $user->save();
        }
    }
}
