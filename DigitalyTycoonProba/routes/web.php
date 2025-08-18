<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FAQsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PricingPlanController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ContactFormController; // Dodajemo ovo
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Http\Request;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

// Pages
Route::group(['prefix' => LaravelLocalization::setLocale()], function() {
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/faqs', [FAQsController::class, 'index'])->name('faqs');



Route::get('/services', [ServiceController::class, 'index']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/team', [TeamMemberController::class, 'index']);
Route::get('/pricing', [PricingPlanController::class, 'index']);
Route::get('/testimonials', [TestimonialController::class, 'index']);


Route::post('/contact', [ContactFormController::class, 'submit'])->name('contact.submit');

});
