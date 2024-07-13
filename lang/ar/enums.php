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
];
