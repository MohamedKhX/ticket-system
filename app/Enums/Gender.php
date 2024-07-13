<?php

namespace App\Enums;

enum Gender: string
{
    use Enum;

    case Male   = "Male";
    case Female = "Female";

    public static function getColor($color): string
    {
        return match ($color) {
            self::Male   => 'warning',
            self::Female => 'danger'
        };
    }
}
