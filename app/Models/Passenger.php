<?php

namespace App\Models;

use App\Enums\AgeGroup;
use App\Enums\SeatType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Passenger extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
      'age_group' => AgeGroup::class,
      'seat_type' => SeatType::class,
    ];

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }

    public function fullName(): Attribute
    {
        return Attribute::get(fn() => $this->first_name . ' ' . $this->last_name);
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('passport_image')
            ->singleFile();
    }

    public function generateDownloadLinkForTicket(): string
    {
        return route('download-ticket', $this->id);
    }

}
