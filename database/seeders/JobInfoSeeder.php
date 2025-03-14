<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobInfo;

class JobInfoSeeder extends Seeder
{
    public function run()
    {
        JobInfo::factory()->count(50)->create();
    }
}
