<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class PayPalController extends Controller
{
    /**
     * Иницира PayPal плаћање креирањем PayPal налога и преусмеравањем корисника.
     * Рута: POST /paypal/payment (име: paypal.process)
     * Прима 'order' ID из query параметра URL-а.
     */
    public function processPayment(Request $request)
    {
        // 1. Провера и добијање ID-а поруџбине
        $orderId = $request->input('order');

        if (!$orderId) {
            Log::error('PayPal processPayment: Недостаје ID поруџбине у захтеву.');
            return view('paypal.error', ['message' => 'Payment processing error: Order ID not found.', 'order_id' => null]);
        }

        $order = Order::find($orderId);

        if (!$order) {
            Log::error('PayPal processPayment: Поруџбина није пронађена. ID: ' . $orderId);
            return view('paypal.error', ['message' => 'Payment processing error: Order does not exist.', 'order_id' => $orderId]);
        }

        // 2. Иницијализација PayPal провајдера
        $provider = new PayPalClient;
        
        try {
            $provider->setApiCredentials(config('paypal'));
            $accessToken = $provider->getAccessToken();
            $provider->setAccessToken($accessToken);
        } catch (\Exception $e) {
            Log::error('PayPal API Credentials Error: ' . $e->getMessage());
            return view('paypal.error', ['message' => 'Error connecting to PayPal: ' . $e->getMessage(), 'order_id' => $orderId]);
        }

        // 3. Припрема података за креирање PayPal поруџбине
        $data = [
            'intent' => 'CAPTURE', // Намена је да се одмах изврши наплата
            'application_context' => [
                'return_url' => route('paypal.success', ['order' => $order->id]), // Враћамо order ID за каснију проверу
                'cancel_url' => route('paypal.cancel', ['order' => $order->id]),   // Враћамо order ID за каснију проверу
                'brand_name' => config('app.name') ?: 'Online Shop', // Име ваше апликације
                'locale' => 'en-US',
                'shipping_preference' => 'NO_SHIPPING',
                'user_action' => 'PAY_NOW', // Приказује "Pay Now" дугме на PayPal-у
            ],
            'purchase_units' => [
                [
                    'reference_id' => $order->id, // ID ваше поруџбине, за праћење
                    'description' => 'Purchase from ' . (config('app.name') ?: 'Online Shop') . ' - Order #' . $order->id,
                    'amount' => [
                        'currency_code' => config('paypal.currency', 'USD'), // Користите валуту из конфигурације
                        'value' => number_format($order->total_amount, 2, '.', ''), // Форматирање на 2 децимале
                    ],
                ]
            ]
        ];

        // 4. Креирање PayPal поруџбине и преусмеравање
        try {
            $paypalOrder = $provider->createOrder($data);
            Log::info('PayPal Order креиран:', ['paypal_order_id' => $paypalOrder['id'], 'status' => $paypalOrder['status'], 'order_id' => $order->id]);

            // Пронађите "approve" link за преусмеравање корисника
            foreach ($paypalOrder['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    // Преусмери корисника на PayPal
                    return redirect()->away($link['href']);
                }
            }

            Log::error('PayPal processPayment: "Approve" link није пронађен за преусмеравање у PayPal одговору.');
            return view('paypal.error', ['message' => 'Error redirecting to PayPal. Please try again.', 'order_id' => $order->id]);

        } catch (\Exception $e) {
            Log::error('Грешка при креирању PayPal поруџбине: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return view('paypal.error', ['message' => 'An error occurred while initiating PayPal payment: ' . $e->getMessage(), 'order_id' => $order->id]);
        }
    }

    /**
     * Обрађује успешно PayPal плаћање.
     * Рута: GET /paypal/success (име: paypal.success)
     * PayPal шаље 'token' (PayPal Order ID) и 'PayerID' (ID платиоца) у query параметрима.
     * Овде такође прима 'order' ID који смо послали у return_url.
     */
    public function success(Request $request)
    {
        Log::info('PayPal success метода позвана.', $request->all());

        $paypalOrderId = $request->input('token'); // PayPal шаље свој Order ID као 'token'
        $orderIdFromUrl = $request->input('order'); // Наш Order ID који смо послали у return_url

        if (empty($paypalOrderId)) {
            Log::error('PayPal success: Недостаје PayPal Order ID (token).');
            return view('paypal.error', ['message' => 'Payment could not be confirmed. Missing PayPal token.', 'order_id' => $orderIdFromUrl]);
        }

        $provider = new PayPalClient;
        try {
            $provider->setApiCredentials(config('paypal'));
            $accessToken = $provider->getAccessToken();
            $provider->setAccessToken($accessToken);
        } catch (\Exception $e) {
            Log::error('PayPal API Credentials Error on success callback: ' . $e->getMessage());
            return view('paypal.error', ['message' => 'Error connecting to PayPal. Your payment might not be recorded.', 'order_id' => $orderIdFromUrl]);
        }

        try {
            // Покушајте да извршите (capture) плаћање
            $response = $provider->capturePaymentOrder($paypalOrderId);
            Log::info('PayPal Payment Capture Response:', $response);

            if (isset($response['status']) && $response['status'] == 'COMPLETED') {
                $transactionId = $response['id']; // ID PayPal трансакције
                // Покушај да пронађеш reference_id унутар purchase_units
                $orderReferenceId = $response['purchase_units'][0]['payments']['captures'][0]['custom_id'] ?? ($response['purchase_units'][0]['reference_id'] ?? null);

                // Ако orderReferenceId није пронађен из PayPal одговора, користите онај из URL-а
                if (!$orderReferenceId) {
                    $orderReferenceId = $orderIdFromUrl;
                }

                $order = Order::find($orderReferenceId);

                if ($order) {
                    // *** ПОЧЕТАК НОВЕ ПРОВЕРЕ ИЗНОСА ***
                    $paypalAmount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'] ?? null;
                    $paypalCurrency = $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'] ?? null;

                    // Проверите да ли је износ из PayPal-а исти као износ поруџбине у бази
                    // Користите number_format да би се оба износа поредила у истом формату
                    if ($paypalAmount !== null && 
                        number_format($paypalAmount, 2, '.', '') != number_format($order->total_amount, 2, '.', '') ||
                        $paypalCurrency != config('paypal.currency', 'USD')) {
                        
                        Log::warning('PayPal success: Неподударање износа или валуте!', [
                            'order_id' => $order->id,
                            'db_amount' => $order->total_amount,
                            'paypal_amount' => $paypalAmount,
                            'db_currency' => config('paypal.currency', 'USD'),
                            'paypal_currency' => $paypalCurrency,
                        ]);
                        // Опционо: Можете променити статус поруџбине на 'payment_mismatch' или 'failed'
                        // return view('paypal.error', ['message' => 'Payment amount mismatch. Please contact support.', 'order_id' => $order->id]);
                        // Тренутно само логујемо упозорење, али можете и прекинути процес.
                    }
                    // *** КРАЈ НОВЕ ПРОВЕРЕ ИЗНОСА ***

                    // Ажурирај статус поруџбине и трансакције
                    $order->update([
                        'payment_status' => 'completed',
                        'transaction_id' => $transactionId,
                        'status' => 'processed', // Поставите статус ваше поруџбине
                    ]);

                    // Очистите корпу након успешне поруџбине
                    if ($order->user && $order->user->cart) {
                        $order->user->cart->cartItems()->delete();
                        $order->user->cart->delete();
                    }

                    return view('paypal.success', [
                        'message' => 'Your payment was successful and your order has been confirmed! Thank you for your purchase.',
                        'order_id' => $order->id,
                        'transaction_id' => $transactionId
                    ]);
                } else {
                    Log::error('PayPal success: Локална поруџбина није пронађена. PayPal Order ID: ' . $paypalOrderId . ', Референца: ' . $orderReferenceId);
                    return view('paypal.error', ['message' => 'Payment successful, but the order could not be updated in our database. Please contact support with transaction ID: ' . $transactionId, 'order_id' => $orderIdFromUrl]);
                }
            } else {
                Log::warning('PayPal success: Плаћање није COMPLETED.', ['response' => $response]);
                // Ако статус није COMPLETED, можда је PENDING, FAILED итд.
                $message = $response['details'][0]['description'] ?? 'Your payment was not successfully completed.';
                return view('paypal.error', ['message' => $message . ' Please try again or choose another payment method.', 'order_id' => $orderIdFromUrl]);
            }
        } catch (\Exception $e) {
            Log::error('Грешка при обради успешног PayPal плаћања: ' . $e->getMessage(), ['trace' => $e->getTraceAsString(), 'request' => $request->all()]);
            return view('paypal.error', ['message' => 'An error occurred while confirming your payment. Please check your PayPal account or contact support.', 'order_id' => $orderIdFromUrl]);
        }
    }

    /**
     * Метод за отказано PayPal плаћање.
     * Рута: GET /paypal/cancel (име: paypal.cancel)
     * Прима 'order' ID из query параметра URL-а.
     */
    public function cancel(Request $request)
    {
        Log::info('PayPal cancel метода позвана.', $request->all());
        $orderId = $request->input('order');

        $message = 'Payment has been canceled.';
        if ($orderId) {
            $message .= ' For order #' . $orderId . '.';
            $order = Order::find($orderId);
            if ($order && $order->payment_status === 'pending') {
                $order->update(['status' => 'cancelled', 'payment_status' => 'cancelled']);
                Log::info('Order ' . $orderId . ' status set to cancelled after PayPal cancel.');
            }
        }
        return view('paypal.cancel', ['message' => $message, 'order_id' => $orderId]);
    }
}