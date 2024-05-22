<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserAddress;
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
        $userProfile = UserProfile::create([
            'suffix' => '',
            'firstname' => 'Joshua',
            'middlename' => 'Alfaro',
            'lastname' => 'Villanueva',
            'gender' => 1,
            'civil_status' => 3,
            'religion' => 7,
            'role' => '',
            'is_admin' => true,
            'is_required_to_change_password' => false,
            'is_otp_enabled' => false,
            'is_active' => true,
            'email_verified_at' => now(),
            
        ]);
        User::create([
            'id' => $userProfile->id,
            'email' => 'villanuevajoshua27@gmail.com',
            'password' => 'Pa$$w0rd!',
            
        ]);

        UserAddress::create([
            'id' => $userProfile->id,
            'region' => '03',
            'province' => '0314',
            'city' => '031420',
            'barangay' => '031420003',
            'address' => 'Blk 20 Lot 24 Daisy Street Evergreen Heights',
            'zip_code' => '3023',
        ]);

        
    }
}
