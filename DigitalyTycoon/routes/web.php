<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PayPalController; // Dodajte ovaj use iskaz
use App\Http\Controllers\StripeController; // Dodajte ovaj use iskaz
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;

Route::group(['prefix' => LaravelLocalization::setLocale()], function() {

    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');

    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/portfolio', function () {
        return view('portfolio');
    })->name('portfolio');

    Route::get('/services', function () {
        return view('services');
    })->name('services');

    Route::get('/shop', [ProductController::class, 'index'])->name('shop');
    Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('product.show');

    /*
    Route::get('checkout', function () {
        return view('components/shop/checkout');
    })->name('checkout');
    */

    


    Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');


    // Prikaz checkout forme
    Route::get('/checkout/{product:slug}', [CheckoutController::class, 'show'])->name('checkout');

    // POST: kreiranje purchase i AJAX poziv
    Route::post('/checkout/{product}', [CheckoutController::class, 'checkout'])->name('checkout.store');    

    // <-------------------- Start Routes of PayPal -------------------->
    Route::post('/paypal/payment', [PayPalController::class, 'processPayment'])->name('paypal.process');
    Route::get('/paypal/success', [PayPalController::class, 'success'])->name('paypal.success');
    Route::get('/paypal/cancel', [PayPalController::class, 'cancel'])->name('paypal.cancel');
    // <-------------------- End Routes of PayPal -------------------->

    // <-------------------- Start Routes of Stripe -------------------->
    Route::post('/stripe/payment', [StripeController::class, 'processPayment'])->name('stripe.process');
    Route::get('/stripe/success/{order}', [StripeController::class, 'success'])->name('stripe.success');
    Route::get('/stripe/cancel', [StripeController::class, 'cancel'])->name('stripe.cancel');
    // <-------------------- End Routes of Stripe -------------------->

});






