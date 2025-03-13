<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'title' => 'Information Technology',
                'image' => 'it.jpg', // Ensure you have an image file in public storage
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Healthcare',
                'image' => 'healthcare.jpg',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Finance',
                'image' => 'finance.jpg',
                'status' => 'inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Education',
                'image' => 'education.jpg',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
