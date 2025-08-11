<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactFormController; // Dodajemo ovo

Route::get('/', function () {
    return view('welcome');
});


// Ruta za prikazivanje kontakt forme (ako je na posebnoj stranici)
Route::get('/contact', [ContactFormController::class, 'show'])->name('contact.form'); // Primer

// Ruta za obradu podataka iz kontakt forme
Route::post('/contact/submit', [ContactFormController::class, 'submit'])->name('contact.submit');