<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\CustomPageController;

Route::get('/', [JobController::class, 'home'])->name('home');
Route::get('/job_detail/{id}', [CustomPageController::class, 'jobDetail'])->name('job_detail');
Route::get('/page/{slug}', [CustomPageController::class, 'show'])->name('page.show');
Route::get('/search-jobs/{id}/{type}', [JobController::class, 'index'])->name('search.jobs');
Route::view('/contact-us', 'frontend.contact_us')->name('contact-us');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('jobs', JobController::class); 
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
