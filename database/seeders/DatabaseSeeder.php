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
        User::factory(10)->create();
        UserProfile::factory(10)->create();

        $this->call([
            GlobalParameterTypeSeeder::class,
            GlobalParameterSeeder::class,

        ]);
    }
}
