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
            'name'=>'24_hours',
            'price'=>'2.99',
            'duration'=>24
            ],
            [
            'name'=>'72_hours',
            'price'=>'5.99',
            'duration'=>72,
            ],
            [
            'name'=>'144_hours',
            'price'=>'9.99',
            'duration'=>144,
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
