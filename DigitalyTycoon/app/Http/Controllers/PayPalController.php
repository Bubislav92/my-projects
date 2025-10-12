<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\PayPalPaidMail;

class PayPalController extends Controller
{
    public function processPayment(Request $request)
    {
        $productSlug = $request->product;
        $product = Product::where('slug', $productSlug)->firstOrFail();

        // Inicijalizuj PayPal client
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        // Kreiraj PayPal order
        $order = $provider->createOrder([
            'intent' => 'CAPTURE',
            'application_context' => [
                'return_url' => route('paypal.success', ['product' => $product->slug]),
                'cancel_url' => route('paypal.cancel'),
            ],
            'purchase_units' => [[
                'amount' => [
                    'currency_code' => 'USD',
                    'value' => $product->discount_price ?? $product->price,
                ],
                'description' => $product->getTranslation('name', app()->getLocale()),
            ]],
        ]);

        // Provera da li je PayPal uspešno kreirao order
        if (isset($order['id']) && $order['id'] != null) {
            foreach ($order['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']); // Preusmeri korisnika na PayPal
                }
            }

            return redirect()->route('paypal.cancel')->with('error', 'Greška: Link za plaćanje nije pronađen.');
        } else {
            return redirect()->route('paypal.cancel')->with('error', $order['message'] ?? 'Greška pri kreiranju PayPal porudžbine.');
        }
    }


    public function success(Request $request)
    {
        $productSlug = $request->query('product'); // ovo dolazi iz URL-a
        if (!$productSlug) {
            return redirect()->route('shop')->with('error', 'Greška: Nevalidan proizvod.');
        }

        $product = Product::where('slug', $productSlug)->firstOrFail();

        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $paymentId = $request->query('token');
        if (!$paymentId) {
            return redirect()->route('shop')->with('error', 'Greška: Nevalidan PayPal token.');
        }

        $capture = $provider->capturePaymentOrder($paymentId);

        if (isset($capture['status']) && $capture['status'] === 'COMPLETED') {
            $payer = $capture['payer'] ?? [];

            Purchase::create([
                'customer_name'   => ($payer['name']['given_name'] ?? '') . ' ' . ($payer['name']['surname'] ?? ''),
                'customer_email'  => $payer['email_address'] ?? 'Nepoznato',
                'product_id'      => $product->id,
                'product_name'    => $product->getTranslation('name', app()->getLocale()),
                'amount'          => $product->discount_price ?? $product->price,
                'currency'        => $capture['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'] ?? 'USD',
                'payment_method'  => 'paypal',
                'payment_status'  => 'paid',
                'payment_id'      => $capture['id'] ?? $paymentId,
                'download_path'   => $product->download_path,
            ]);

            return view('components.shop.success', compact('product'));
        }

        return redirect()->route('paypal.cancel')->with('error', 'Plaćanje nije završeno.');
    }





    public function cancel(Request $request)
    {
        // Opcionalno: možete proslediti poruku korisniku
        $message = $request->query('error', 'Plaćanje je otkazano od strane korisnika.');

        return view('components.shop.cancel', compact('message'));
    }

}