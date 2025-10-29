<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('services', function () {
    return view('services');
})->name('services');

Route::get('about', function () {
    return view('about');
})->name('about');

Route::get('team', function () {
    return view('team');
})->name('team');

Route::get('contact', function () {
    return view('contact');
})->name('contact');

Route::get('appointment', function () {
    return view('appointment');
})->name('appointment');

Route::get('blog', function () {
    return view('blog');
})->name('blog');

Route::get('post', function () {
    return view('single-post');
})->name('single-post');