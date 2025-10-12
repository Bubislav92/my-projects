<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\StripePaidMail;

class StripeController extends Controller
{
    public function processPayment(Request $request)
    {
        // ovde kreiraš Stripe session
        // i preusmeravaš korisnika na Stripe checkout
    }

    public function success(Request $request, $order = null)
    {
        // recimo da imaš session_id ili payment_id iz Stripe-a
        $paymentId = $request->query('session_id'); 

        // Primer: dohvatimo proizvod koji je plaćen
        $product = Product::where('slug', $request->query('product'))->firstOrFail();

        // Upis kupovine u bazu
        Purchase::create([
            'customer_name'   => $request->query('name', 'Nepoznato'),
            'customer_email'  => $request->query('email', 'Nepoznato'),
            'product_id'      => $product->id,
            'product_name'    => $product->getTranslation('name', app()->getLocale()), // jer koristiš spatie translations
            'amount'          => $product->discount_price ?? $product->price,
            'currency'        => 'USD',
            'payment_method'  => 'stripe',
            'payment_status'  => 'paid',
            'payment_id'      => $paymentId,
            'download_path'   => $product->download_path,
        ]);

        return view('components.shop.success', compact('product'));
    }

    public function cancel()
    {
        return view('components.shop.cancel');
    }
}