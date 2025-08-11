<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    /**
     * Prikazuje listu želja korisnika.
     */
    public function index()
    {
        $wishlistItems = WishList::with('product')
            ->where('user_id', Auth::id())
            ->get();

        return view('components.wishlist', compact('wishlistItems'));
    }

    /**
     * Dodaje proizvod u listu želja.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $user = Auth::user();
        $product = Product::findOrFail($request->product_id);

        $exists = WishList::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->exists();

        if ($exists) {
            return redirect()->back()->with([
                'wishlist_info' => 'This product is already in your wishlist.',
                'added_wishlist_product_id' => $product->id,
                'added_wishlist_product_name' => $product->name,
                'added_wishlist_product_image' => $product->thumbnail_url,
            ]);
        }

        WishList::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
        ]);

        return redirect()->back()->with([
            'wishlist_success' => 'Product added to wishlist.',
            'added_wishlist_product_id' => $product->id,
            'added_wishlist_product_name' => $product->name,
            'added_wishlist_product_image' => $product->thumbnail_url,
        ]);
    }



    /**
     * Uklanja proizvod iz liste želja.
     */
    public function destroy($id)
    {
        $wishlistItem = WishList::findOrFail($id);

        if ($wishlistItem->user_id !== Auth::id()) {
            abort(403); // Zabrani pristup ako nije vlasnik
        }

        $wishlistItem->delete();

        return redirect()->back()->with('success', 'Product removed from wishlist.');
    }
}
