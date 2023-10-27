<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Helpers
use Illuminate\Support\Facades\Schema;

//Models
use App\Models\Subject;
//Cos'è lo slug?

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Schema::withoutForeignKeyConstraints(function(){
            Subject::truncate();
        });

        $subjects =[
            'Arpa',
            'Batteria',
            'Canto',
            'Chitarra',
            'Flauto',
            'Pianoforte',
            'Violino',
            'Violoncello',
            'Xilofono',
        ];

        foreach ($subjects as $subject)
        {
            Subject::create([
                'name'=>$subject
            ]);
        }
        
    }
}
