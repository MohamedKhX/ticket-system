<?php


return [
    'user_type' => [
        \App\Enums\UserType::Admin->value    => 'آدمن',
        \App\Enums\UserType::Employee->value => 'موظف',
    ],

    'gender' => [
        \App\Enums\Gender::Male->value   => 'ذكر',
        \App\Enums\Gender::Female->value => 'أنثى',
    ],

    'age_group' => [
        \App\Enums\AgeGroup::Adult->value   => 'بالغ',
        \App\Enums\AgeGroup::Child->value   => 'طفل',
        \App\Enums\AgeGroup::Infant->value  => 'رضيع',
    ],

    'seat_type' => [
        \App\Enums\SeatType::Economy->value   => 'اقتصادي',
        \App\Enums\SeatType::First_class->value  => 'درجة أولى',
    ],

    'flight_type' => [
        \App\Enums\FlightType::One_way->value   => 'ذهاب فقط',
        \App\Enums\FlightType::Round_trip->value  => 'ذهاب وإياب',
    ],

    'booking_status' => [
        \App\Enums\BookingStatus::Pending->value    => 'الانتظار',
        \App\Enums\BookingStatus::Booked_up->value  => 'محجوزة',
        \App\Enums\BookingStatus::Canceled->value   => 'ملغية',
    ],

    'flight_status' => [
        \App\Enums\FlightStatus::In_future->value    => 'في المستقبل',
        \App\Enums\FlightStatus::In_past->value      => 'في الماضي',
        \App\Enums\FlightStatus::In_present->value   => 'في الحاضر',
    ],

    'trip_destination' => [
        \App\Enums\TripDestination::DomesticFlights->value => 'رحلات داخلية',
        \App\Enums\TripDestination::ForeignTrips->value   => 'رحلات خارجية'
    ]
];
