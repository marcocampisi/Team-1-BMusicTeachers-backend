<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//Helpers
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function(){
            User::truncate();
        });

        $users = config('users');

        foreach ($users as $user) {
        
            User::create([
                'last_name'=> $user['last_name'],
                'first_name'=> $user['first_name'],
                'email'=> $user['email'],
                'email_verified_at'=> null,
                'password'=> $user['password'],
            ]);
         
        }
        
    }
}
