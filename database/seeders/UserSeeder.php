<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'email' => 'villanuevajoshua27@gmail.com',
            'password' => 'Pa$$w0rd!',
            'email_verified_at' => now(),
        ]);

        UserProfile::create([
            'id' => $user->id,
            'firstname' => 'Joshua',
            'middlename' => 'Alfaro',
            'lastname' => 'Villanueva',
            'gender' => 1,
            'civil_status' => 3,
            'religion' => 7,
        ]);
    }
}
