<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }
    public function session(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $productName = $request->get('productName');
        $totalPrice = $request->get('total');

        // Ensure totalPrice is an integer and multiply by 100 to convert to cents
        $total = intval($totalPrice) * 100;

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'USD',
                    'product_data' => [
                        'name' => $productName,
                    ],
                    'unit_amount' => $total,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('PaymentSuccess'),
            'cancel_url' => route('checkout'),
        ]);

        return redirect()->away($session->url);
    }

    public function PaymentSuccess()
    {
        return "Thanks for your order! You have just completed your payment. The seller will reach out to you as soon as possible.";
    }
}
