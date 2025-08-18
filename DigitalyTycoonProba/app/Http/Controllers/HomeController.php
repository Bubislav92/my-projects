<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Models\HomePost;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index() :View
    {

      //$language = App::getLocale();

    //$aboutPosts = AboutPost::all();

    //$aboutPost = AboutPost::first();

    //$language = App::getLocale();

        

     // Dohvati samo JEDAN HomePost, koji sadrži SVE prevode za sve jezike
    // Obično za statičke stranice kao "O nama" postoji samo jedan zapis.
    $homePost = HomePost::first(); 
    
    // Ako iz nekog razloga ne postoji nijedan HomePost (npr. baza prazna)
    if (!$homePost) {
        // Možeš vratiti prazan model ili preusmeriti, ili prikazati poruku o grešci
        // Za sada ćemo vratiti prazan model da ne bi došlo do greške u Blade-u
        $homePost = new HomePost(); 
    }

      return view('pages.home', ['homePost' => $homePost]);
    }
}
