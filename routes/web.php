<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SurveyController;

Route::get('/', [SurveyController::class, 'home'])->name('home');
Route::view('/job_detail', 'frontend.job_detail')->name('job_detail');
Route::view('/about-us', 'frontend.about_us');
Route::view('/contact-us', 'frontend.contact_us');
Route::view('/all-job', 'frontend.all_jobs');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('jobs', JobController::class); 
});

Route::get('/', [SurveyController::class, 'home'])->name('home');
// Route::get('/survey', [SurveyController::class, 'showForm'])->name('survey.form');
// Route::post('/survey', [SurveyController::class, 'submitForm'])->name('survey.submit');


 
require __DIR__.'/auth.php';
