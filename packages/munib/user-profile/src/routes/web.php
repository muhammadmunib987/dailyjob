<?php

use Illuminate\Support\Facades\Route;
use Munib\UserProfile\Http\Controllers\UserProfileController;

Route::middleware(['web'])->group(function () {
    Route::get('/user-profile', [UserProfileController::class, 'index'])->name('user.profile');
});
