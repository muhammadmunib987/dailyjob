<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_surveys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->text('hobbies'); // Store hobbies as a JSON string
            $table->enum('user_type', ['Student', 'Job Holder', 'Other']);
            $table->string('field_of_study')->nullable(); // For students
            $table->string('job_field')->nullable(); // For job holders
            $table->string('other_details')->nullable(); // For "Other" user type
            $table->text('country_crisis_opinion')->nullable(); // User's opinion on country crisis
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_surveys');
    }
}
