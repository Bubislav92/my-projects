<?php

use App\Http\Controllers\ProfileController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
