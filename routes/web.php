<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'main');

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


/*Route::get('/checkout/{booking:stripe_price_id}/{booking_id}',  [\App\Http\Controllers\PaymentController::class, 'checkout'])
    ->name('checkout');
Route::get('/sendEmail/{plan:id}', [\App\Http\Controllers\PaymentController::class, 'sendEmail'])->name('sendEmail');
Route::get('/cancel',              [\App\Http\Controllers\PaymentController::class, 'cancel'])->name('cancel');
*/
