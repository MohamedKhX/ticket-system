<?php

use App\Enums\UserType;
use App\Http\Controllers\ProfileController;
use App\Models\Airline;
use App\Models\Airport;
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

Route::get('/checkout/{booking}',  [\App\Http\Controllers\PaymentController::class, 'checkout'])->name('checkout');

Route::get('/payment/success',  [\App\Http\Controllers\PaymentController::class, 'success'])->name('payment.success');

Route::get('/payment/cancel', function () {
    return 'تم الإلغاء';
})->name('payment.cancel');

Route::get('/cancel-booking/{booking:id}', function (\App\Models\Booking $booking) {
    return view('cancel-booking', ['booking' => $booking]);
})->name('cancel-booking');

Route::get('/delete-booking/{booking:id}', function (\App\Models\Booking $booking) {
    $booking->deleteOrFail();
    return redirect(route('booking.canceled'));
})->name('delete-booking');

Route::view('booking/canceled', 'delete-booking')->name('booking.canceled');
Route::get('/customer', function () {
    return view('customer');
})->name('customer');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';


Route::get('dashboard', function () {
    if(\auth()->user()->type === UserType::Admin->value) {
        return redirect('/admin');
    }

    return redirect('/airline');
});
