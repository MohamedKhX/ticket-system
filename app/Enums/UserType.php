<?php

namespace App\Enums;

enum UserType: string
{
    use Enum;

    case Admin    = 'admin';
    case Employee = 'employee';
}
