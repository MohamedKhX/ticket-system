<?php


return [
    'user_type' => [
        \App\Enums\UserType::Admin->value    => 'آدمن',
        \App\Enums\UserType::Employee->value => 'موظف',
        \App\Enums\UserType::Customer->value => 'عميل'
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
        \App\Enums\SeatType::Business->value  => 'أعمال',
    ]
];
