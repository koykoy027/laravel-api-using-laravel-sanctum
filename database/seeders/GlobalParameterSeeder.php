<?php

namespace Database\Seeders;

use App\Models\GlobalParameter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GlobalParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Gender 
        GlobalParameter::create([
            'type' => 1,
            'name' => 'Male',
        ]);
        GlobalParameter::create([
            'type' => 1,
            'name' => 'Female',
        ]);

        // Civil Status
        GlobalParameter::create([
            'type' => 2,
            'name' => 'Single',
        ]);
        GlobalParameter::create([
            'type' => 2,
            'name' => 'Married',
        ]);
        GlobalParameter::create([
            'type' => 2,
            'name' => 'Divorce',
        ]);
        GlobalParameter::create([
            'type' => 2,
            'name' => 'Widowed',
        ]);

        // Religion
        GlobalParameter::create([
            'type' => 3,
            'name' => 'Roman Catholic',
        ]);
        GlobalParameter::create([
            'type' => 3,
            'name' => 'Muslim',
        ]);
        GlobalParameter::create([
            'type' => 3,
            'name' => 'Iglesia ni Cristo',
        ]);
    }
}
