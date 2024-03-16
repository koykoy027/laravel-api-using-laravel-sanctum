<?php

namespace Database\Seeders;

use App\Models\GlobalParameterType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GlobalParameterTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GlobalParameterType::create([
            'name' => 'Gender',
        ]);
        GlobalParameterType::create([
            'name' => 'Civil Status',
        ]);
        GlobalParameterType::create([
            'name' => 'Religion',
        ]);
    }
}
