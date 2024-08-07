<?php

use App\Models\Airline;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $airlines = Airline::all();

    return view('main', [
        'airlines' => $airlines
    ]);
})->name('main');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::get('/search', function () {
    return view('flights-table');
})->name('flights-table');

Route::get('/send', function() {
    \Illuminate\Support\Facades\Mail::to('muhamedkhx2@gmail.com')->send(new \App\Mail\ticket());
});

Route::get('/print', function () {
    $model = new \App\Models\Flight();

    return view('reports.print', compact('model'));
});



Route::get('/checkout/{booking}',  [\App\Http\Controllers\PaymentController::class, 'checkout'])->name('checkout');

Route::view('/payment/success', 'payment.success')->name('payment.success');

Route::get('/payment/cancel', function () {
    return 'تم الإلغاء';
})->name('payment.cancel');
