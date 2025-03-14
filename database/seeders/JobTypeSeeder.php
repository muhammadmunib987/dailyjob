<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobType;

class JobTypeSeeder extends Seeder {
    public function run() {
        $jobTypes = [
            ['title' => 'Work from Home', 'status' => 1],
            ['title' => 'Internship Job', 'status' => 1],
            ['title' => 'Freelancer Job', 'status' => 1],
            ['title' => 'Part Time Job', 'status' => 1],
            ['title' => 'Full Time Job', 'status' => 1],
        ];

        foreach ($jobTypes as $jobType) {
            JobType::create($jobType);
        }
    }
}
