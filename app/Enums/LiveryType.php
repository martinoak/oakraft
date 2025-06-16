<?php

namespace App\Enums;

enum LiveryType: string
{
    case BASIC = 'basic';
    case SPECIAL = 'special';

    public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }
}
