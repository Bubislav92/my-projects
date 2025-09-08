<?php

use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('home'); // 'index' се односи на index.blade.php фајл
})->name('home');

Route::get('/about', function () {
    return view('about'); 
})->name('about');

Route::get('/services', function () {
    return view('services'); 
})->name('services');

Route::get('/contact', function () {
    return view('contact'); 
})->name('contact');

Route::get('/gallery', function () {
    return view('gallery'); 
})->name('gallery');