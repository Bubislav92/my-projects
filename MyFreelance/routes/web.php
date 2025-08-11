<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckUserRole;

//<--------------- Start of Navigation --------------->
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about-us', function () {
    return view('pages.about-us');
})->name('about-us');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/terms', function () {
    return view('pages.terms');
})->name('terms');

Route::get('/privacy', function () {
    return view('pages.privacy');
})->name('privacy');
//<--------------- End of Navigation --------------->

//<--------------- Start Dashboard of Freelancer --------------->
Route::middleware(['auth', CheckUserRole::class . ':freelancer'])->group(function () {
    Route::get('/freelancer/home', function () {
        return view('freelancer.home');
    })->name('freelancer.home');

    Route::get('/freelancer/dashboard', function () {
        return view('freelancer.dashboard.index');
    })->name('freelancer.dashboard');
});
//<--------------- End Dashboard of Freelancer --------------->

//<--------------- Start Dashboard of Client --------------->
Route::middleware(['auth', CheckUserRole::class . ':client'])->group(function () {
    Route::get('/client/home', function () {
        return view('client.home');
    })->name('client.home');

    Route::get('/client/dashboard', function () {
        return view('client.dashboard.index');
    })->name('client.dashboard');
});
//<--------------- End Dashboard of Client --------------->

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

/*
Route::middleware(['auth', CheckUserRole::class . ':administrator'])->group(function () {
    Route::get('/admin/dashboard', function () {
        // ...
    })->name('admin.dashboard');
});
*/

/*
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/
require __DIR__.'/auth.php';
