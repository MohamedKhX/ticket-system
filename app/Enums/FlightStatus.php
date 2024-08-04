<?php

namespace App\Enums;

enum FlightStatus: string
{
    use Enum;

    case In_future  = 'In Future';
    case In_past    = 'In Past';
    case In_present = 'In Present';
}
