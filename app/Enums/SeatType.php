<?php

namespace App\Enums;

enum SeatType: string
{
    use Enum;

    case Economy = 'economy';
    case Business = 'business';
}
