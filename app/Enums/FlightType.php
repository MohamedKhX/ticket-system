<?php

namespace App\Enums;

enum FlightType: string
{
    use Enum;

    case One_way = 'One Way';
    case Round_trip = 'Round Trip';
}
