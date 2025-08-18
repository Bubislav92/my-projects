<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductReview;
use App\Models\Order; // Pretpostavljamo da imate Order model
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    /**
     * Store a new product review.
     */
    public function store(Request $request, Product $product)
    {
        // Validacija podataka iz forme
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'nullable|string|max:1000',
        ]);

        $user = Auth::user();

        // Proveravamo da li je korisnik kupio ovaj proizvod
        $hasPurchased = $user->orders()
            ->whereHas('orderItems', function ($query) use ($product) {
                $query->where('product_id', $product->id);
            })
            ->where('status', 'isporuceno') // Proverite status porudzbine u svojoj bazi
            ->exists();

        if (!$hasPurchased) {
            return back()->with('error', 'Morate kupiti proizvod da biste ostavili recenziju.');
        }

        // Proveravamo da li je korisnik već ostavio recenziju
        $existingReview = ProductReview::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->first();

        if ($existingReview) {
            return back()->with('error', 'Već ste ostavili recenziju za ovaj proizvod.');
        }

        // Kreiranje i čuvanje nove recenzije
        $review = new ProductReview([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'rating' => $request->rating,
            'review_text' => $request->review_text,
        ]);
        $review->save();

        // Opciono: ažuriranje prosečne ocene na proizvodu
        $product->average_rating = $product->reviews()->avg('rating');
        $product->save();

        return back()->with('success', 'Hvala vam na recenziji!');
    }
}