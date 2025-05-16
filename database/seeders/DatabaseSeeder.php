<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminUserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(DesignationSeeder::class);
        $this->call(SkillSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(JobTypeSeeder::class);  
        $this->call(EducationSeeder::class);
        $this->call(JobInfoSeeder::class);  
        $this->call(BlogSeeder::class);  

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
