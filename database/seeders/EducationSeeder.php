<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $educationLevels = [
            ['name' => 'Matriculation', 'status' => 1],
            ['name' => 'Intermediate', 'status' => 1],
            ['name' => 'Bachelor\'s Degree', 'status' => 1],
            ['name' => 'Master\'s Degree', 'status' => 1],
            ['name' => 'PhD', 'status' => 1],
        ];

        DB::table('education')->insert($educationLevels);
    }
}
