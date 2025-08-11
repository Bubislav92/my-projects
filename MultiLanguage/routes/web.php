<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; 
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale()], function() {
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('/', function() {
        return view('home');
    })->name('home');
});


/*
Route::get('/', function () {
    return view('home');
});

*/