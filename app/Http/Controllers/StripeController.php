<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function checkout(Request $request)
    {
        $user = auth()->user();
        
        return $user->checkout(['price_1234567890'], [
            'success_url' => route('checkout.success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel'),
        ]);
    }
    
    public function success(Request $request)
    {
        // Handle successful payment
        return view('payment.success');
    }
    
    public function cancel()
    {
        // Handle cancelled payment
        return view('payment.cancel');
    }
}