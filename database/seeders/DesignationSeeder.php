<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('designations')->insert([
            [
                'category_id' => 1, // Assuming category 1 exists (e.g., IT)
                'title' => 'Software Engineer',
                'image' => 'software_engineer.jpg', // Ensure image exists in public storage
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2, // Assuming category 2 exists (e.g., Healthcare)
                'title' => 'Nurse',
                'image' => 'nurse.jpg',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 3, // Assuming category 3 exists (e.g., Finance)
                'title' => 'Accountant',
                'image' => 'accountant.jpg',
                'status' => 'inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
