<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart; // Dodato za direktan pristup Cart modelu
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class StripeController extends Controller
{
    /**
     * Konstruktor za postavljanje Stripe API ključa.
     */
    public function __construct()
    {
        Stripe::setApiKey(config('stripe.secret'));
    }

    /**
     * Pokreće proces plaćanja kreiranjem Stripe Checkout sesije.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function processPayment(Request $request)
    {
        $orderId = $request->input('order');
        $order = Order::find($orderId);

        if (!$order) {
            Log::error('Stripe processPayment: Order not found. ID: ' . $orderId);
            return view('stripe.error', ['message' => 'Payment processing error: Order does not exist.', 'order_id' => $orderId]);
        }

        try {
            // Kreiranje Stripe Checkout sesije
            $checkoutSession = Session::create([
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => config('stripe.currency'),
                            'product_data' => [
                                'name' => 'Narudžbina #' . $order->id,
                                'description' => 'Kupovina iz Vesna\'s Web Store',
                            ],
                            'unit_amount' => (int)($order->total_amount * 100),
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                // Održavamo success_url rutu koja prosleđuje order ID i session ID
                'success_url' => route('stripe.success', ['order' => $order->id]) . '?session_id={CHECKOUT_SESSION_ID}', 
                'cancel_url' => route('stripe.cancel', ['order' => $order->id]),
                'metadata' => [
                    'order_id' => $order->id,
                ],
                'customer_email' => $order->email, 
            ]);

            Log::info('Stripe Checkout Session created:', [
                'session_id' => $checkoutSession->id,
                'url' => $checkoutSession->url,
                'order_id' => $order->id
            ]);

            return redirect()->away($checkoutSession->url);

        } catch (\Exception $e) {
            Log::error('Error creating Stripe Checkout Session: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return view('stripe.error', ['message' => 'An error occurred while initiating Stripe payment: ' . $e->getMessage(), 'order_id' => $order->id]);
        }
    }

    /**
     * Obrađuje uspešnu Stripe uplatu nakon što se korisnik vrati sa Stripe Checkout stranice.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order  Laravel Route Model Binding automatski pronalazi porudžbinu
     * @return \Illuminate\View\View
     */
    public function success(Request $request, Order $order)
    {
        Log::info('Stripe success method called.', $request->all());

        $sessionId = $request->query('session_id'); 
        $orderId = $order->id;

        if (empty($sessionId)) {
            Log::error('Stripe success: Missing session ID in request.', $request->all());
            return view('stripe.error', ['message' => 'Payment could not be confirmed. Missing Stripe session ID.', 'order_id' => $orderId]);
        }

        try {
            $checkoutSession = Session::retrieve($sessionId);

            if ($checkoutSession->payment_status === 'paid') {
                DB::beginTransaction();

                try {
                    $order = Order::find($orderId);
                    if (!$order) {
                        Log::error('Stripe success: Order not found during confirmation. ID: ' . $orderId);
                        DB::rollBack();
                        return view('stripe.error', ['message' => 'Order not found for confirmation.', 'order_id' => $orderId]);
                    }

                    // Ažuriranje statusa porudžbine
                    $order->payment_status = 'paid';
                    $order->status = 'processing';
                    $order->transaction_id = $sessionId; 
                    $order->save();

                    // <-------------------- KLJUČNI DEO: BRISANJE KORPE -------------------->
                    Log::info('Attempting to clear cart for order ID: ' . $order->id . ' and user ID: ' . $order->user_id);
                    if ($order->user) {
                        $userCart = $order->user->cart;
                        
                        if ($userCart) {
                            try {
                                $userCart->cartItems()->delete(); 
                                $userCart->delete();
                                Log::info('Cart cleared successfully for user ID: ' . $order->user_id);
                            } catch (\Exception $cartException) {
                                Log::error('Error clearing cart for user ' . $order->user_id . ': ' . $cartException->getMessage(), ['trace' => $cartException->getTraceAsString()]);
                            }
                        } else {
                            Log::warning('No active cart found for user ' . $order->user_id . ' associated with order ' . $order->id);
                        }
                    } else {
                        Log::warning('Order ' . $order->id . ' is not associated with a user or user not found during cart clearing attempt.');
                    }
                    // <-------------------- KRAJ KLJUČNOG DELA -------------------->

                    DB::commit();

                    Log::info('Stripe payment confirmed and order updated successfully.', ['order_id' => $order->id, 'session_id' => $sessionId]);

                    // <-------------------- IZMENA JE OVDE: PRIKAZUJEMO VIEW DIREKTNO -------------------->
                    // Umesto redirecta na drugu rutu, sada direktno prikazujemo success view
                    return view('stripe.success', [
                        'message' => 'Ваша наруџбина је успешно плаћена и потврђена!',
                        'order_id' => $order->id,
                        'transaction_id' => $sessionId,
                        'order' => $order // Prosleđujemo ceo Order objekat view-u
                    ]);
                    // <-------------------- KRAJ IZMENE -------------------->

                } catch (\Exception $dbException) {
                    DB::rollBack();
                    Log::error('Stripe success: Database transaction failed for Order ' . $orderId . ': ' . $dbException->getMessage(), ['trace' => $dbException->getTraceAsString()]);
                    return view('stripe.error', ['message' => 'An error occurred while updating order status after payment. Please contact support.', 'order_id' => $orderId]);
                }

            } else {
                Log::warning('Stripe payment not paid or pending for session: ' . $sessionId, ['payment_status' => $checkoutSession->payment_status]);
                return view('stripe.error', ['message' => 'Payment status is not "paid". Please try again or contact support.', 'order_id' => $orderId]);
            }

        } catch (\Stripe\Exception\ApiErrorException $e) {
            Log::error('Stripe API Error in success method: ' . $e->getMessage(), ['trace' => $e->getTraceAsString(), 'session_id' => $sessionId]);
            return view('stripe.error', ['message' => 'An error occurred while confirming your Stripe payment: ' . $e->getMessage(), 'order_id' => $orderId]);
        } catch (\Exception $e) {
            Log::error('General Error in Stripe success method: ' . $e->getMessage(), ['trace' => $e->getTraceAsString(), 'session_id' => $sessionId]);
            return view('stripe.error', ['message' => 'An unexpected error occurred during payment confirmation. Please contact support.', 'order_id' => $orderId]);
        }
    }

    /**
     * Obrađuje otkazivanje Stripe uplate.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function cancel(Request $request)
    {
        $orderId = $request->input('order');
        $order = Order::find($orderId);

        if ($order) {
            Log::info('Stripe payment cancelled by user for order: ' . $orderId);
        } else {
            Log::warning('Stripe cancel: Order not found. ID: ' . $orderId);
        }

        return view('stripe.cancel', ['order_id' => $orderId]);
    }
}