<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function checkout($stripePriceId, $bookingId)
    {
        return auth()->user()->checkout([$stripePriceId => 1], [
            'mode' => 'subscription',
            'success_url' => \route('sendEmail', $bookingId),
            'cancel_url'  => \route('cancel')
        ]);
    }

    public function sendEmail()
    {

    }

    public function cancel()
    {
        return 'تم الإلغاء';
    }
}
