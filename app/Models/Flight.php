<?php

namespace App\Models;

use App\Enums\SeatType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Flight extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    public function aircraft(): BelongsTo
    {
        return $this->belongsTo(Aircraft::class);
    }

    public function departureAirport(): BelongsTo
    {
        return $this->belongsTo(Airport::class, 'departure_airport_id');
    }

    public function arrivalAirport(): BelongsTo
    {
        return $this->belongsTo(Airport::class, 'arrival_airport_id');
    }

    public function economySeatsRemaining(): int
    {
        $economySeats = $this->aircraft->economy_seats;
        $reservedSeats = Passenger::join('bookings', 'passengers.booking_id', '=', 'bookings.id')
            ->where('bookings.flight_id', $this->id)
            ->where('passengers.seat_type', SeatType::Economy->value)
            ->count();

        return $economySeats - $reservedSeats;
    }

    public function businessSeatsRemaining(): int
    {
        $businessSeats = $this->aircraft->business_seats;
        $reservedSeats = Passenger::join('bookings', 'passengers.booking_id', '=', 'bookings.id')
            ->where('bookings.flight_id', $this->id)
            ->where('passengers.seat_type', SeatType::Business->value)
            ->count();

        return $businessSeats - $reservedSeats;
    }
}
