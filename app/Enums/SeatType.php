<?php

namespace App\Enums;

enum SeatType: string
{
    use Enum;

    case Economy = 'economy';
    case First_class = 'first class';
}
