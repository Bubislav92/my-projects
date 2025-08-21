<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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

});