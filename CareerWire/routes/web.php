<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserJobController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home'); 
    }
    return view('welcome');
});



Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

Route::get('network', function () {
    return view('network');
})->name('network');

Route::get('jobs', function () {
    return view('jobs');
})->name('jobs');

Route::get('messages', function () {
    return view('messages');
})->name('messages');

Route::get('notifications', function () {
    return view('notifications');
})->name('notifications');


// Уместо:
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

// Урадите ОВАКО: Користите ProfileController да вратите view
Route::get('/dashboard', [ProfileController::class, 'showDashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Група рута за управљање подешавањима профила
Route::middleware('auth')->group(function () {
    
    // --- ОСНОВНИ ПОДАЦИ (Подразумевана рута за Dashboard) ---
    // Ова рута ће се поклопити са првим линком у Sidebaru
    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit'); 
        
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
        
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
        
    // --- РАДНО ИСКУСТВО ---
    Route::get('/profile/experience', [ProfileController::class, 'editExperience'])
        ->name('experience.edit'); // Користи се у Sidebaru
        
    // --- ПРИВАТНОСТ ---
    Route::get('/profile/privacy', [ProfileController::class, 'editPrivacy'])
        ->name('profile.edit.privacy'); // Користи се у Sidebaru
        
    // --- МОЈИ ОГЛАСИ (За послодавце) ---
    Route::get('/jobs/manage', [UserJobController::class, 'manage']) // Претпостављамо JobController
        ->name('jobs.manage'); // Користи се у Sidebaru
});

/*

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

*/

require __DIR__.'/auth.php';
