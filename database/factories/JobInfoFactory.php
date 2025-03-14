<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\JobInfo;
use App\Models\Category;
use App\Models\JobType;
use App\Models\User;
use Illuminate\Support\Str;

class JobInfoFactory extends Factory
{
    protected $model = JobInfo::class;

    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle,
            'category_id' => Category::inRandomOrder()->first()->id ?? 1,
            'designation_id' => rand(1, 3),
            'job_type_id' => JobType::inRandomOrder()->first()->id ?? 1,
            'min_experience' => rand(1, 3),
            'max_experience' => rand(4, 10),
            'min_salary' => rand(30000, 50000),
            'max_salary' => rand(60000, 150000),
            'no_of_position' => rand(1, 5),
            'job_shift' => $this->faker->randomElement(['Morning', 'Evening', 'Night']),
            'gender' => $this->faker->randomElement(['Male', 'Female', 'Any']),
            'job_expiry_date' => now()->addDays(rand(15, 60)),
            'job_contact_email' => $this->faker->safeEmail,
            'location' => $this->faker->address,
            'job_description' => $this->faker->paragraphs(3, true),
            'job_requirement' => $this->faker->paragraphs(2, true),
            'created_by' => User::inRandomOrder()->first()->id ?? 1,
        ];
    }
}
