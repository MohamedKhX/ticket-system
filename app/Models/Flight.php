<?php

namespace App\Models;

use App\Enums\FlightStatus;
use App\Enums\FlightType;
use App\Enums\SeatType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Flight extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $casts = [
        'flight_type' => FlightType::class,
    ];

    protected $guarded = [];

    public function aircraft(): BelongsTo
    {
        return $this->belongsTo(Aircraft::class);
    }

    public function airline(): BelongsTo
    {
        return $this->belongsTo(Airline::class);
    }

    public function departureAirport(): BelongsTo
    {
        return $this->belongsTo(Airport::class, 'departure_airport_id');
    }

    public function arrivalAirport(): BelongsTo
    {
        return $this->belongsTo(Airport::class, 'arrival_airport_id');
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function passengers(): HasManyThrough
    {
        return $this->hasManyThrough(Passenger::class, Booking::class);
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

    public function firstClassSeatsRemaining(): int
    {
        $firstClassSeats = $this->aircraft->first_class_seats;
        $reservedSeats = Passenger::join('bookings', 'passengers.booking_id', '=', 'bookings.id')
            ->where('bookings.flight_id', $this->id)
            ->where('passengers.seat_type', SeatType::First_class->value)
            ->count();

        return $firstClassSeats - $reservedSeats;
    }

    public function economyBookedSeats(): Attribute
    {
        return Attribute::get(fn() => $this->passengers()->where('seat_type', '=', SeatType::Economy)->count());
    }

    public function firstClassBookedSeats(): Attribute
    {
        return Attribute::get(fn() => $this->passengers()->where('seat_type', '=', SeatType::First_class)->count());
    }

    public function flightStatus(): Attribute
    {
        return Attribute::get(function() {
            return $this->getFlightType();
        });
    }

    protected function getFlightType(): FlightStatus
    {
        if($this->departure_time > now()) {
            return FlightStatus::In_future;
        }

        if($this->departure_time < now() && $this->arrival_time > now()) {
            return FlightStatus::In_present;
        }

        return FlightStatus::In_past;
    }

    public static function getExportColumns(): array
    {
        return [
            'first_class_price' => 'الطائرة',
        ];
    }
}
