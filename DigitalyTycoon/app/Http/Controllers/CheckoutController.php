<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Http\Request;
use App\Models\Purchase;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    
    public function index()
    {
        return view('components.shop.checkout');
    }
    
    public function show(Product $product)
    {
        //dd($product);
        return view('components.shop.checkout', compact('product'));
    }

    public function checkout(Request $request, Product $product)
    {
        // ✅ Validacija unosa
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
        ]);

        // ✅ Upis u bazu
        Purchase::create([
            'product_id' => $product->id,
            'product_name' => $product->name['en'] ?? $product->name,
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'amount' => $product->discount_price ?? $product->price,
            'currency' => 'USD',
            'payment_method' => 'pending',
            'payment_status' => 'pending',
            'download_path' => $product->download_path,
        ]);

        // ✅ Vrati istu stranu sa modalom otvorenim
        return back()->with('open_payment_modal', true);
    }


}




    
