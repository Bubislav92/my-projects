<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\RefundRequest;
use Illuminate\Support\Facades\Auth;

class RefundController extends Controller
{
    public function handleRefund(Request $request)
    {
        $request->validate([
            'payment_id' => 'required|string',
            'email' => 'required|email',
            'reason' => 'required|string|max:1000',
        ]);

        $payment = Payment::where('payment_id', $request->payment_id)
                          ->where('payer_email', $request->email)
                          ->first();

        if (!$payment) {
            return back()->withErrors(['message' => 'The data does not match.']);
        }

        if (RefundRequest::where('payment_id', $payment->id)->exists()) {
            return back()->withErrors(['message' => 'A request for this payment has already been sent.

']);
        }

        RefundRequest::create([
            'user_id' => Auth::id(),
            'payment_id' => $payment->id,
            'capture_id' => $payment->capture_id,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);

        return view('paypal.refund', [
            'message' => 'Your request has been successfully sent. The administration will contact you.',
        ]);
        
    }
}
