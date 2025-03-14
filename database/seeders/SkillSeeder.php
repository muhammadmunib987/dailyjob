<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('skills')->insert([
            [
                'designation_id' => 1, // Assuming Software Engineer designation exists
                'title' => 'PHP',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'designation_id' => 1,
                'title' => 'JavaScript',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'designation_id' => 2, // Assuming Nurse designation exists
                'title' => 'Patient Care',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'designation_id' => 3, // Assuming Accountant designation exists
                'title' => 'Financial Analysis',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
