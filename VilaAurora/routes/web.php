<?php

use Illuminate\Support\Facades\Route;
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('about', function () {
    return view('about');
})->name('about');

Route::get('accommodation', function () {
    return view('accommodation');
})->name('accommodation');

Route::get('appointment', function () {
    return view('appointment');
})->name('appointment');

Route::get('contact', function () {
    return view('contact');
})->name('contact');