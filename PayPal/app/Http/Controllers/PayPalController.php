<?php

namespace App\Http\Controllers;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;
use App\Models\Payment; // <-- Dodajte ovu liniju za Payment model
use App\Models\PaymentLog;
use Carbon\Carbon; // <-- Dodajte ovu liniju za Carbon
use Illuminate\Support\Facades\Log; // Za logovanje grešaka
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentSuccessMail;
use App\Mail\PaymentFailedMail;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class PayPalController extends Controller
{
    Public function paypal(Request $request)
    {

      $provider = new PayPalClient;
      $provider->setApiCredentials(config('paypal'));
      $paypalToken = $provider->getAccessToken();
      $response = $provider->createOrder([
          "intent" => "CAPTURE",
          "application_context" => [
              "return_url" => route('success'),
              "cancel_url" => route('cancel')
          ],
          "purchase_units" => [
              [
                  "amount" => [
                      "currency_code" => "USD",
                      "value" => $request->price
                  ]
              ]
          ]
      ]);
      //dd($response);

      if(isset($response['id']) && $response['id'] != null) {
          foreach($response['links'] as $link) {
              if($link['rel'] == 'approve') {
                  session()->put('product_name', $request->product_name);
                  session()->put('quantity', $request->quantity);
                  return redirect()->away($link['href']);
              }
          }
      } else {
          return redirect()->route('cancel');
      }
      //dd($response);
    }

    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
        //dd($response);
        if(isset($response['status']) && $response['status'] == 'COMPLETED') {

          // Креирање новог Payment модела
          $payment = new Payment();

          

            // Insert data into database
            $payment->payment_id = $response['id'];
            $payment->user_id = Auth::id();
            $payment->capture_id = $response['purchase_units'][0]['payments']['captures'][0]['id'] ?? null;
            $payment->product_name = session()->get('product_name');
            //$payment->quantity = session()->get('quantity');
            $payment->amount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            $payment->currency = $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'];
            $payment->payer_name = $response['payer']['name']['given_name'] ?? null;
            $payment->payer_email = $response['payer']['email_address'] ?? null;
            $payment->status = 'completed';
            $payment->save();

            // 2. Унос у payment_logs
            PaymentLog::create([
                'user_id' => $payment->user_id,
                'payment_id' => $payment->payment_id,
                'capture_id' => $payment->capture_id,
                'product_name' => $payment->product_name,
                'amount' => $payment->amount,
                'currency' => $payment->currency,
                'status' => $payment->status,
                'event' => 'payment_completed',
                'payload' => json_encode($response),
            ]);

            $pdf = Pdf::loadView('pdf.invoice', ['payment' => $payment]);


            // ✅ Пошаљи емајл са PDF у прилогу
            //Mail::to($payment->payer_email)->send(new PaymentSuccessMail($payment));
            //Mail::to('tvoja.admin.email@example.com')->send(new PaymentSuccessMail($payment));

            if (!empty($payment->payer_email))
            {
              Mail::to($payment->payer_email)->send(new PaymentSuccessMail($payment));
            }

            // Очистимо сесију
            session()->forget(['product_name', 'quantity']);

            return view('paypal.success', [
                'payer_name' => $payment->payer_name,
                'amount' => $payment->amount,
                'currency' => $payment->currency,
            ]);

        } else {
            return redirect()->route('cancel');
        }
    }

    public function cancel(Request $request)
    {

      // Узмемо основне податке из сесије
    $product = session()->get('product_name', 'Unknown Product');
    $payerEmail = session()->get('payer_email', 'test@example.com'); // Ако немамо прави емајл, стављамо фиктиван

      // Можда ћеш имати неке делимичне податке у сесији
      $payment = new Payment();
      $payment->payment_id = $request->input('token', 'unknown');
      $payment->product_name = session()->get('product_name');
      //$payment->quantity = session()->get('quantity');
      $payment->status = 'cancelled';
      $payment->amount = 0;
      $payment->currency = 'USD';
      $payment->payer_name = null;
      $payment->payer_email = null;
      $payment->payment_method = null;
      $payment->save();

      // 2. Унос у payment_logs
      PaymentLog::create([
        'user_id' => $payment->user_id,
        'payment_id' => $payment->payment_id,
        'capture_id' => $payment->capture_id ?? null,
        'product_name' => $payment->product_name,
        'amount' => $payment->amount,
        'currency' => $payment->currency,
        'status' => 'cancelled',
        'event' => 'payment_failed',
        'payload' => 'User has cancelled the Payment',
    ]);

      session()->forget(['product_name', 'quantity']);

      return view('paypal.cancel');

    }

}
