<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Flight;
use Illuminate\Http\Request;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function checkout(Booking $booking)
    {
        Stripe::setApiKey(config('stripe.sk'));
        $session = \Stripe\Checkout\Session::create([
           'line_items' => [
               [
                   'price_data' => [
                       'currency' => 'usd',
                       'product_data' => [
                           'name' => 'حجز رحلة',
                       ],
                       'unit_amount' => round(($booking->total_price * 100) / 7),
                   ],
                   'quantity' => 1,
               ],
           ],
            'mode' => 'payment',
            'success_url' => route('payment.success'),
            'cancel_url' => route('payment.cancel'),
        ]);
        return redirect()->away($session->url);
    }

    public function success()
    {
        $booking = Booking::latest()->get()->first();

        \Illuminate\Support\Facades\Mail::to($booking->email)->send(new \App\Mail\ticket($booking));

        return view('payment.success');
    }

    public function cancel()
    {
        return 'تم الإلغاء';
    }
}
