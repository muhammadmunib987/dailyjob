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
            $table->foreignId('category_id')->nullable()->constrained('categories')->comment('Foreign key for job category');
            $table->foreignId('designation_id')->nullable()->constrained('designations')->comment('Foreign key for job designation');
            $table->foreignId('job_type_id')->nullable()->constrained('job_types')->comment('Foreign key for job type');
            $table->foreignId('education_id')->nullable()->constrained('education')->comment('Foreign key for education');
            $table->tinyInteger('min_experience')->unsigned()->nullable()->comment('Minimum experience required in years');
            $table->tinyInteger('max_experience')->unsigned()->nullable()->comment('Maximum experience required in years');
            $table->decimal('min_salary', 10, 2)->nullable()->comment('Minimum salary offered');
            $table->decimal('max_salary', 10, 2)->nullable()->comment('Maximum salary offered');
            $table->unsignedInteger('no_of_position')->nullable()->comment('Number of positions available');
            $table->enum('job_shift', ['morning', 'evening', 'night'])->nullable()->comment('Job shift type');
            $table->enum('gender', ['male', 'female', 'any'])->nullable()->comment('Preferred gender for the job');
            $table->enum('apply_via', ['email', 'external_website', 'whatsapp'])->nullable()->comment('Apply job via external link or email');
            $table->date('job_expiry_date')->nullable()->comment('Job expiry date');
            $table->string('job_contact_email')->nullable()->comment('Contact email for job applications');
            $table->string('job_contact_no')->nullable()->comment('Contact number for job applications');
            $table->string('location')->nullable()->comment('Job location');
            $table->string('external_website_link')->nullable()->comment('External website link for applying');
            $table->longText('job_description')->nullable()->comment('Detailed job description');
            $table->longText('job_requirement')->nullable()->comment('Job requirements and qualifications');
            $table->foreignId('created_by')->nullable()->constrained('users')->comment('User who created the job posting');
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
