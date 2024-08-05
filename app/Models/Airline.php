<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Airline extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class);
    }

    public function bookings(): HasManyThrough
    {
        return $this->hasManyThrough(Booking::class, Flight::class);
    }
}
