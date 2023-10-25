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
            // Genera un numero casuale di voti da associare all'insegnante
            $numRatings = rand(10, 15);
        
            for ($i = 0; $i < $numRatings; $i++) {
                // Imposta la data di inizio come una data casuale nei 5 anni precedenti
                $startDate = Carbon::now()->subYears(rand(1, 5));
                
                // Imposta la data di fine come l'ultimo giorno del mese corrente
                $endDate = Carbon::now()->endOfMonth();
                
                // Genera una data casuale tra la data di inizio e fine
                $randomDate = Carbon::createFromTimestamp(mt_rand($startDate->timestamp, $endDate->timestamp));
        
                // Associa il voto all'insegnante con la data casuale
                $teacher->ratings()->attach($ratings->random()->id, [
                    'created_at' => $randomDate,
                    'updated_at' => $randomDate
                ]);
            }
        }
    }
}
