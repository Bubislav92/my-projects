<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart; // Uvezite Cart model
use App\Models\Wishlist; // Uvezite Wishlist model
use App\Models\CartItem; // Uvezite CartItem model (iako se direktno ne koristi ovde, dobra praksa)

class HeaderComposer
{
    public function compose(View $view)
    {
        $cartCount = 0;
        $wishlistCount = 0;

        if (Auth::check()) {
            $user = Auth::user();

            // Dohvatanje broja stavki u korpi
            // Korisnik ima jednu korpu (User->cart), a ta korpa ima više stavki (Cart->cartItems)
            $cart = $user->cart; 
            if ($cart) {
                // Sumiramo 'quantity' svih CartItem-a u toj korpi
                $cartCount = $cart->cartItems->sum('quantity');
            }
            
            // Dohvatanje broja stavki na listi želja
            // Korisnik ima više Wishlist stavki (User->wishlistItems)
            $wishlistCount = $user->wishlistItems()->count();
        }

        $view->with('cartCount', $cartCount);
        $view->with('wishlistCount', $wishlistCount);
    }
}