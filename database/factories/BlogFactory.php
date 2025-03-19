<?php

namespace Database\Factories;

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    protected $model = Blog::class;
    
    public function definition(): array
    {
        $title = $this->faker->sentence(6);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'short_description' => $this->faker->paragraph,
            'content' => $this->faker->paragraphs(5, true),
            'feature_image' => 'assets/img/default_blog.png',
            'tags' => json_encode($this->faker->words(5)),
            'status' => $this->faker->randomElement(['draft', 'published', 'archived']),
            'published_at' => $this->faker->optional()->dateTime,
            'created_by' => \App\Models\User::inRandomOrder()->value('id') ?? null,
            'updated_by' => \App\Models\User::inRandomOrder()->value('id') ?? null,
            'meta_title' => $this->faker->sentence,
            'meta_description' => $this->faker->text(160),
            'meta_keywords' => implode(',', $this->faker->words(10)),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
