<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//helpers
use Illuminate\Support\Facades\Schema;

//model
use App\Models\Sponsorization;

class SponsorizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function(){
            Sponsorization::truncate();
        });

        $sponsorizations=[
            [
            'name'=>'1 Giorno',
            'price'=>'2.99',
            'duration'=>24
            ],
            [
            'name'=>'3 Giorni',
            'price'=>'5.99',
            'duration'=>72,
            ],
            [
            'name'=>'7 Giorni',
            'price'=>'9.99',
            'duration'=>168,
            ]];

        foreach($sponsorizations as $sponsorization)
        {
            Sponsorization::create([
                'name'=> $sponsorization['name'],
                'price'=> $sponsorization['price'],
                'duration'=> $sponsorization['duration']

            ]);
        }

    }
}
