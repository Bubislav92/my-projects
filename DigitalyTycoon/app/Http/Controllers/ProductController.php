<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Prikazuje listu svih proizvoda (shop stranica).
     */
    public function index()
    {
        $products = Product::where('is_published', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('shop', compact('products'));
    }

    /**
     * Prikazuje pojedinačni proizvod po slugu.
     */
    public function show(Product $product)
    {
        return view('components.shop.product-show', compact('product'));
    }
}
