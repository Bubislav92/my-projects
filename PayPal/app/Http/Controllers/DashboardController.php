<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\RefundRequest;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $payments = Payment::where('user_id', $user->id)->latest()->get();
        $refunds = RefundRequest::where('user_id', $user->id)->latest()->get();

        return view('dashboard', compact('payments', 'refunds'));
    }
}
