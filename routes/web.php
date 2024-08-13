<?php

use App\Models\Airline;
use App\Models\Airport;
use App\Models\Passenger;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    $airlines = Airline::all();
    $airports = Airport::all();

    return view('main', [
        'airlines' => $airlines,
        'airports' => $airports
    ]);
})->name('main');


Route::get('/download-ticket/{passenger:id}', function (Passenger $passenger) {
    $bookingPath = 'public/bookings/' . $passenger->booking->id . '/';
    $passengerPath = $bookingPath . $passenger->id . '.pdf';
    $path = Storage::path($passengerPath);

    return response()->download($path);
})->name('download-ticket');

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

Route::get('/payment/success',  [\App\Http\Controllers\PaymentController::class, 'success'])->name('payment.success');

Route::get('/payment/cancel', function () {
    return 'تم الإلغاء';
})->name('payment.cancel');


Route::get('/ticket', function () {

    return view('ticket', [
        'passenger' => \App\Models\Passenger::find(1)
    ]);

    $pdf = Pdf::loadView('ticket', [
        'passenger' => Passenger::find(1)
    ]);

    Storage::put('public/pdf/invoice.pdf', $pdf->output());
    $path = Storage::path('public/pdf/invoice.pdf');

    return response()->download($path);
});



