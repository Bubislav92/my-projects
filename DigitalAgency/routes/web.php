<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('services', function () {
    return view('services');
})->name('services');

Route::get('portfolio', function () {
    return view('portfolio');
})->name('portfolio');

Route::get('about', function () {
    return view('about');
})->name('about');

Route::get('blog', function () {
    return view('blog');
})->name('blog');

Route::get('contact', function () {
    return view('contact');
})->name('contact');

Route::get('blog-single-page', function () {
    return view('blog-single');
})->name('blog-single');