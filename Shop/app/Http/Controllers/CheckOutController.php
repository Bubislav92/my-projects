<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Support\Facades\Log; // Potrebno za logovanje grešaka
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\StripeController;

class CheckOutController extends Controller
{
    /**
     * Prikazuje checkout stranicu sa podacima o korpi i korisniku.
     */
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Proverite da li je korisnik uopšte ulogovan
        if (!$user) {
            return redirect()->route('login')->with('info', 'Morate biti prijavljeni da biste pristupili stranici za naplatu.');
        }

        // Eager-load 'cartItems' i 'product' relacije za efikasnost
        $cart = $user->cart()->with('cartItems.product')->first();

        // Proverite da li korpa postoji ili je prazna
        if (!$cart || $cart->cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('warning', 'Vaša korpa je prazna. Dodajte proizvode pre nego što nastavite.');
        }

        // Izvuci stavke korpe za prikaz
        $cartItems = $cart->cartItems;

        // Pripremi korisničke podatke za prikaz u formi
        // Koristite polja koja su definsana u vašem User modelu (npr. address_line_1, zip_code)
        $userData = [
            'first_name' => $user->name ?? '', // Ako 'name' sadrži puno ime, razmislite o razdvajanju
            'last_name' => '', // Ako nemate odvojena first_name/last_name polja, moraćete ih parsirati iz 'name' ili dodati ta polja u User model
            'email' => $user->email ?? '',
            'phone' => $user->phone ?? '',
            'address' => $user->address_line_1 ?? '', // Koristite address_line_1
            'city' => $user->city ?? '',
            'postal_code' => $user->zip_code ?? '', // Koristite zip_code
            'country' => $user->country ?? '',
        ];

        // Izračunaj podzbir, dostavu i ukupan iznos
        $subtotal = $cartItems->sum(function($item) {
            $price = $item->product->discount_price ?? $item->product->price;
            return $price * $item->quantity;
        });
        $shipping = 10.00; // Pretpostavljena cena dostave
        $total = $subtotal + $shipping;

        // Prosleđivanje svih potrebnih varijabli Blade-u
        return view('checkout.index', compact('cartItems', 'userData', 'subtotal', 'shipping', 'total'));
    }

    /**
     * Obrađuje POST zahtev za kreiranje porudžbine i vraća JSON odgovor.
     */
    public function processOrder(Request $request)
    {
        // 1. Validacija ulaznih podataka
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'required|string|max:255', // Ovo se mapira na address_line_1
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10', // Ovo se mapira na zip_code
            'country' => 'required|string|max:255',
            'payment_method' => 'required|string|in:paypal,stripe',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Provera da li je korisnik ulogovan i da li ima korpu
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Niste prijavljeni. Molimo prijavite se.'], 401);
        }

        $cart = $user->cart()->with('cartItems.product')->first(); // Koristi relaciju 'cart()' sa eager loadingom

        if (!$cart || $cart->cartItems->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'Vaša korpa je prazna. Dodajte proizvode pre nego što nastavite sa kupovinom.'], 400);
        }

        $cartItems = $cart->cartItems; // Preuzmi učitane stavke korpe
        
        // Izračunaj ukupan iznos
        $subtotal = $cartItems->sum(function($item) {
            $price = $item->product->discount_price ?? $item->product->price;
            return $price * $item->quantity;
        });
        $shipping = 10.00; // Pretpostavljena cena dostave
        $totalAmount = $subtotal + $shipping;

        try {
            DB::beginTransaction();

            // 2. Kreiranje porudžbine
            $order = Order::create([
                'user_id' => $user->id,
                'email' => $validatedData['email'],
                'total_amount' => $totalAmount,
                'status' => 'pending',
                'shipping_address_line1' => $validatedData['address'],
                'shipping_address_line2' => '', // Ako imate drugu liniju adrese
                'shipping_city' => $validatedData['city'],
                'shipping_state' => '', // Ako imate polje za državu/pokrajinu
                'shipping_zip_code' => $validatedData['postal_code'],
                'shipping_country' => $validatedData['country'],
                'payment_status' => 'pending',
                'payment_method' => $validatedData['payment_method'],
                'transaction_id' => null,
                'expires_at' => now()->addHours(72), // Rok važenja porudžbine 72h
            ]);

            // 3. Kreiranje stavki porudžbine
            foreach ($cartItems as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'price_at_purchase' => $cartItem->product->discount_price ?? $cartItem->product->price,
                ]);
            }

            // 4. Potvrda transakcije
            DB::commit();

            // 5. Pošalji email (preko queue-a)
            //Mail::to($user->email)->queue(new OrderConfirmationMail($order));
            if (!empty($order->email)) {
                Mail::to($order->email)->queue(new OrderConfirmationMail($order));
                Log::info("Queued confirmation email to: " . $order->email);
            } else {
                Log::warning("Order ID {$order->id} has no email set, skipping confirmation email.");
            }

            // 6. Vraćanje JSON odgovora klijentu
            return response()->json([
                'success' => true,
                'message' => 'Order successfully created.',
                'payment_method' => $validatedData['payment_method'],
                'order_id' => $order->id,
                // Generisanje URL-ova za plaćanje
                'paypal_url' => route('paypal.process', ['order' => $order->id]),
                'stripe_url' => route('stripe.process', ['order' => $order->id]),
            ]);

        } catch (\Exception $e) {
            // U slučaju greške, poništi transakciju i loguj
            DB::rollBack();
            Log::error('Greška pri kreiranju porudžbine u CheckOutControlleru: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return response()->json(['success' => false, 'message' => 'Greška pri kreiranju porudžbine: ' . $e->getMessage()], 500);
        }
    }

     /**
     * Obrađuje plaćanje neplaćene porudžbine.
     * Korisnik dolazi sa linka iz email-a (signed URL).
     */
    public function payPending(Request $request, Order $order)
    {
        // 1. Validacija linka (da nije istekao ili falsifikovan)
        if (!$request->hasValidSignature()) {
            abort(401, 'Link za plaćanje je neispravan ili je istekao.');
        }

        // 2. Provera statusa porudžbine
        if (!in_array($order->status, ['pending', 'na cekanju'])) {
            return redirect()->route('orders.show', $order)
                ->with('error', 'Porudžbina je već plaćena ili otkazana.');
        }

        // 3. Provera da li rok za plaćanje nije istekao
        if ($order->expires_at && $order->expires_at->isPast()) {
            return redirect()->route('orders.show', $order)
                ->with('error', 'Rok za plaćanje porudžbine je istekao.');
        }

        // 4. Preusmeravanje na odgovarajući payment kontroler
        $paymentMethod = $request->query('method');

        if ($paymentMethod === 'stripe') {
            return redirect()->route('stripe.process', ['order' => $order->id]);
        } elseif ($paymentMethod === 'paypal') {
            return redirect()->route('paypal.process', ['order' => $order->id]);
        }

        return redirect()->route('orders.show', $order)
            ->with('error', 'Nepoznat način plaćanja.');
    }


}