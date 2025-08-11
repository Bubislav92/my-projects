<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Страница "Услуге"
Route::get('/services', function () {
    return view('services');
})->name('services');

// Страница "Портфолио"
Route::get('/portfolio', function () {
    return view('portfolio');
})->name('portfolio');

// Страница "О нама"
Route::get('/o-nama', function () {
    return view('about');
})->name('about');

// Страница "Контакт"
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
