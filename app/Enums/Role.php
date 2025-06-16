<?php

namespace App\Enums;

enum Role: string
{
    case USER = 'user';

    case ADMIN = 'admin';

    public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }
}
