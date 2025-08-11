<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Models\AboutPost;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutController extends Controller
{
  public function index() :View
  {

    //$language = App::getLocale();

    //$aboutPosts = AboutPost::all();

    //$aboutPost = AboutPost::first();

    //$language = App::getLocale();

        

     // Dohvati samo JEDAN AboutPost, koji sadrži SVE prevode za sve jezike
    // Obično za statičke stranice kao "O nama" postoji samo jedan zapis.
    $aboutPost = AboutPost::first(); 
    
    // Ako iz nekog razloga ne postoji nijedan AboutPost (npr. baza prazna)
    if (!$aboutPost) {
        // Možeš vratiti prazan model ili preusmeriti, ili prikazati poruku o grešci
        // Za sada ćemo vratiti prazan model da ne bi došlo do greške u Blade-u
        $aboutPost = new AboutPost(); 
    }

    return view('pages.about', ['aboutPost' => $aboutPost]);
  }
}
