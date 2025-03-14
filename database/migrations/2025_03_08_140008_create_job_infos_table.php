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
        Schema::create('job_infos', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('title')->comment('Job title');
            $table->foreignId('category_id')->constrained('categories')->comment('Foreign key for job category');
            $table->foreignId('designation_id')->constrained('designations')->comment('Foreign key for job designation');
            $table->foreignId('job_type_id')->constrained('job_types')->comment('Foreign key for job type');
            $table->foreignId('education_id')->constrained('education')->comment('Foreign key for education');
            $table->tinyInteger('min_experience')->unsigned()->comment('Minimum experience required in years');
            $table->tinyInteger('max_experience')->unsigned()->comment('Maximum experience required in years');
            $table->decimal('min_salary', 10, 2)->nullable()->comment('Minimum salary offered');
            $table->decimal('max_salary', 10, 2)->nullable()->comment('Maximum salary offered');
            $table->unsignedInteger('no_of_position')->comment('Number of positions available');
            $table->enum('job_shift', ['morning', 'evening', 'night'])->comment('Job shift type');
            $table->enum('gender', ['male', 'female', 'any'])->comment('Preferred gender for the job');
            $table->enum('apply_via', ['email', 'external_website','whatsapp'])->comment('Apply job Via external link or on email');
            $table->date('job_expiry_date')->comment('Job expiry date');
            $table->string('job_contact_email')->comment('Contact email for job applications');
            $table->string('job_contact_no')->comment('Contact email for job applications');
            $table->string('location')->comment('Job location');
            $table->string('external_website_link')->nullable()->comment('external website link for apply job');
            $table->longText('job_description')->comment('Detailed job description');
            $table->longText('job_requirement')->comment('Job requirements and qualifications');
            $table->foreignId('created_by')->constrained('users')->comment('User who created the job posting');
            $table->timestamps(); // Created at & Updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_infos');
    }
};
