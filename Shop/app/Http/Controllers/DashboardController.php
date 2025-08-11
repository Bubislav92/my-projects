<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\WishList;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Poslednja porudžbina korisnika
        $lastOrder = $user->orders()->latest()->first();

        // Ukupan broj porudžbina
        $totalOrders = $user->orders()->count();

        // Stavke sa liste želja (sa povezanim proizvodima)
        $wishlistItems = WishList::with('product')
            ->where('user_id', $user->id) // Исправљено: користимо $user->id уместо Auth::user()
            ->get();
        
        // Broj stavki na listi želja
        $wishlistCount = $wishlistItems->count();

        return view('dashboard', compact(
            'user',
            'lastOrder',
            'totalOrders',
            'wishlistItems',
            'wishlistCount'
        ));
    }

    public function orders()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Fetch all orders for the authenticated user, eager-loading the 'items' relationship for efficiency.
        // Use the `latest()` method to sort the orders by the latest creation date.
        $orders = $user->orders()->with('orderItems')->latest()->get();

        // Pass the user and their orders to the view
        return view('dashboard.orders', compact('user', 'orders'));
    }

    public function wishlist()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Fetch all wishlist items for the authenticated user, eager-loading the 'product' relationship.
        $wishlistItems = WishList::with('product')
            ->where('user_id', $user->id)
            ->get();
            
        // Pass the wishlist items to the components/wishlist.blade.php view
        return view('components.wishlist', compact('wishlistItems'));
    }

    public function profile()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Pass the user data to the dashboard/profile.blade.php view
        return view('dashboard.profile', compact('user'));
    }

    /**
     * Враћа детаље поруџбине у JSON формату за модал.
     *
     * @param Order $order
     * @return \Illuminate\Http\JsonResponse
     */
    public function showOrderJson(Order $order)
    {
        // Учитавамо све неопходне релације:
        // - orderItems (ставке поруџбине)
        // - product (производ повезан са ставком)
        // - media (слике производа)
        $order->load(['orderItems.product.media']);

        return response()->json($order);
    }
}
