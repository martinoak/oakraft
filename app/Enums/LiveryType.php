<?php

namespace App\Enums;

enum LiveryType: string
{
    case BASIC = 'Klasická';
    case WHITE = 'Bílá (bez livery)';
    case SPECIAL = 'Speciální';

    public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }
}
