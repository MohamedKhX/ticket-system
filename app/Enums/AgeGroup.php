<?php

namespace App\Enums;

enum AgeGroup: string
{
    use Enum;

    case Adult   = "Adult";
    case Child   = "Child";
    case Infant  = "Infant";
}
