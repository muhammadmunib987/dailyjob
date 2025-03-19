<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\CustomPageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\BlogController;

Route::get('/', [JobController::class, 'home'])->name('home');
Route::get('/categories', [JobController::class, 'categories'])->name('categories');
Route::get('/job_detail/{id}', [CustomPageController::class, 'jobDetail'])->name('job_detail');
Route::get('/page/{slug}', [CustomPageController::class, 'show'])->name('page.show');
Route::get('/search-jobs/{id?}/{type?}', [JobController::class, 'searchJobs'])->name('search.jobs');
Route::get('/find-jobs', [JobController::class, 'searchJobs'])->name('job.search');
Route::get('/blogs', [FrontEndController::class, 'blogs'])->name('blogs');
Route::get('/blog-detail/{slug}', [FrontEndController::class, 'blogDetail'])->name('blog.detail');



Route::get('/contact-us', [ContactController::class, 'contactUs'])->name('contact-us');
Route::post('/contact-submit', [ContactController::class, 'submitContactUs'])->name('contact.submit');

Route::get('/dashboard', [ContactController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('jobs', JobController::class); 
    Route::resource('blog', BlogController::class); 
});


 

Route::get('auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->stateless()->user();

    $user = User::updateOrCreate([
        'email' => $googleUser->getEmail(),
    ], [
        'name' => $googleUser->getName(),
        'google_id' => $googleUser->getId(),
        'password' => bcrypt(uniqid()), // Random password for safety
    ]);

    Auth::login($user);

    return redirect()->route('home'); // Redirect to dashboard/home
});

require __DIR__.'/auth.php';
