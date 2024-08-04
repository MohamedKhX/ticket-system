<?php

namespace App\Models;

use App\Enums\AgeGroup;
use App\Enums\SeatType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('passport_image')
            ->singleFile();
    }

}
