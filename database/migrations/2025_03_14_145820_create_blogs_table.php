<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Blog post title');
            $table->string('slug')->unique()->comment('SEO-friendly URL slug');
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null')->comment('Foreign key for category');
            $table->text('short_description')->nullable()->comment('Short summary of the blog');
            $table->longText('content')->comment('Full blog content');
            $table->string('feature_image')->nullable()->comment('URL for the blog feature image');
            $table->json('tags')->nullable()->comment('Tags associated with the blog');
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft')->comment('Blog status');
            $table->timestamp('published_at')->nullable()->comment('Publish date and time');
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null')->comment('User who created the blog');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null')->comment('User who last updated the blog');
            $table->string('meta_title')->nullable()->comment('SEO meta title');
            $table->text('meta_description')->nullable()->comment('SEO meta description');
            $table->text('meta_keywords')->nullable()->comment('SEO meta keywords');
            $table->softDeletes(); // Enables soft delete functionality
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
