<?php

namespace App\Enums;

enum TripDestination: string
{
    use Enum;

    case DomesticFlights   = "Domestic Flights";
    case ForeignTrips   = "Foreign Trips";
}
