<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // Додај ову линију
use App\Models\Product;

class HomeController extends Controller // Или ProductController итд.
{
    public function index()
    {
        // Дохвати све категорије из базе
        // Можеш додати ->take(6) ако желиш само 6 или ->whereNotNull('image') ако желиш само оне са сликом
        $categories = Category::all();

        // Dohvati samo preporučene proizvode (gde je 'is_featured' true)
        // Možeš dodati ->take(8) ako želiš ograničen broj
        $featuredProducts = Product::where('is_featured', true)->get(); // <-- DODAJ OVU LINIJU

        // Prosledi i kategorije i preporučene proizvode u Blade view
        return view('welcome', compact('categories', 'featuredProducts')); // Проследи категорије у Blade
    }
}