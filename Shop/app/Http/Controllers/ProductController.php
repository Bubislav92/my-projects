<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CartItem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query();

        if ($request->filled('category_slug')) {
            $category = Category::where('slug', $request->input('category_slug'))->first();
            if ($category) {
                $products->where('category_id', $category->id);
            }
        }

        if ($request->has('brand') && is_array($request->input('brand'))) {
            $products->whereIn('brand', $request->input('brand'));
        }

        // FILTER: COLOR
        // Prvo, provera da li su boje prosleđene
        if ($request->has('color') && is_array($request->input('color'))) {
            // Pretvaramo prosleđene boje u mala slova radi upoređivanja
            $colors = collect($request->input('color'))->map(function ($item) {
                return strtolower($item);
            })->toArray();
            
            // Filtriramo proizvode na osnovu tih boja
            $products->whereIn('color', $colors);
        }

        if ($request->filled('rating')) {
            $minRating = (int) $request->input('rating');
            $products->where('average_rating', '>=', $minRating);
        }

        if ($request->filled('max_price')) {
            $maxPrice = (float) $request->input('max_price');
            $products->where('price', '<=', $maxPrice);
        }
        
        if ($request->filled('min_price')) {
            $minPrice = (float) $request->input('min_price');
            $products->where('price', '>=', $minPrice);
        }

        if ($request->has('availability') && is_array($request->input('availability'))) {
            if (in_array('in_stock', $request->input('availability'))) {
                $products->where('quantity', '>', 0);
            }
            if (in_array('on_sale', $request->input('availability'))) {
                $products->whereNotNull('discount_price')->whereColumn('discount_price', '<', 'price');
            }
        }

        $sortBy = $request->input('sort_by', 'created_at');
        $sortOrder = $request->input('sort_order', 'desc');

        $allowedSortColumns = ['name', 'price', 'created_at', 'average_rating'];
        if (!in_array($sortBy, $allowedSortColumns)) {
            $sortBy = 'created_at';
        }

        $allowedSortOrders = ['asc', 'desc'];
        if (!in_array($sortOrder, $allowedSortOrders)) {
            $sortOrder = 'desc';
        }

        $products->orderBy($sortBy, $sortOrder);

        $products = $products->paginate(12)->withQueryString();

        $categories = Category::all();
        
        $availableBrands = Product::select('brand')->distinct()->pluck('brand')->filter()->toArray();

        // Dohvatanje boja, pretvaranje u mala slova, uklanjanje duplikata i null vrednosti
        $availableColors = Product::select('color')
            ->distinct()
            ->pluck('color')
            ->map(function ($color) {
                return strtolower($color);
            })
            ->filter() // Uklanja null/prazne vrednosti
            ->unique() // Uklanja duplikate
            ->values() // Resetuje indekse niza
            ->toArray();


        return view('products.index', compact('products', 'categories', 'availableBrands', 'availableColors'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->latest()
            ->take(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            return response()->json([]);
        }

        $products = Product::where('name', 'LIKE', '%' . $query . '%')
                           ->orWhere('description', 'LIKE', '%' . $query . '%')
                           ->orWhere('slug', 'LIKE', '%' . $query . '%')
                           ->with('media')
                           ->limit(10)
                           ->get()
                           ->map(function ($product) {
                               return [
                                   'id' => $product->id,
                                   'name' => $product->name,
                                   'slug' => $product->slug,
                                   'price' => $product->price,
                                   'discount_price' => $product->discount_price,
                                   'thumbnail_url' => $product->thumbnail_url,
                               ];
                           });

        return response()->json($products);
    }
    
}