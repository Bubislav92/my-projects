<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');


Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/request-quote', function () {
    return view('request-quote');
})->name('request-quote');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/projects', function () {
    return view('portfolio');
})->name('projects');
