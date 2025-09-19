<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('menu', function () {
    return view('menu');
})->name('menu');

Route::get('gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('contact', function () {
    return view('contact');
})->name('contact');

Route::get('reservations', function () {
    return view('reservations');
})->name('reservations');



