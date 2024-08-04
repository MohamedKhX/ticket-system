<?php

namespace App\Enums;

enum BookingStatus: string
{
    use Enum;

    case Pending = 'Pending';
    case Booked_up = 'Booked up';
    case Canceled = 'Canceled';
}
