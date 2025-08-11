<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


Route::post('paypal', [PayPalController::class, 'paypal'])->name('paypal');
Route::get('success', [PayPalController::class, 'success'])->name('success');
Route::get('cancel', [PayPalController::class, 'cancel'])->name('cancel');

Route::post('/refund/request', [RefundController::class, 'handleRefund'])->name('refund.request');

});

require __DIR__.'/auth.php';
