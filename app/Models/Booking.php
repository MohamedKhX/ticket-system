<?php

namespace App\Models;

use App\Enums\BookingStatus;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'status' => BookingStatus::class
    ];

    public function flight(): BelongsTo
    {
        return $this->belongsTo(Flight::class);
    }

    public function passengers(): HasMany
    {
        return $this->hasMany(Passenger::class);
    }

    public function passengerCount(): Attribute
    {
        return Attribute::get(function () {
           return $this->passengers()->count();
        });
    }

    public function generateTickets(): void
    {
        $bookingPath = 'public/bookings/' . $this->id . '/';

        foreach ($this->passengers as $passenger) {
            $passengerPath = $bookingPath . $passenger->id . '.pdf';

            $pdf = Pdf::loadView('ticket', [
                'passenger' => $passenger
            ]);

            Storage::put($passengerPath, $pdf->output());
        }
    }
}
