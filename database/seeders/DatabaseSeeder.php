<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Student;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        User::factory(10)->create();
        UserProfile::factory(10)->create();
        Student::factory(10)->create();


        // User::factory(10)->create(10)->each(function ($user){
        //     $userID = $user->id;

        //     UserProfile::factory()->create([
        //         'id' => $userID,
        //         'firstname' => fake()->firstName(),
        //         'middlename' => fake()->lastName(),
        //         'lastname' => fake()->lastName(),
        //         'gender' => fake()->numberBetween(1, 2),
        //     ]);
        // });
        
    }
}
