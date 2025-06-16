<?php

namespace App\Enums;

enum LiveryType: string
{
    case WHITE = 'Bílá (bez livery)';
    case BASIC = 'Klasická';
    case SPECIAL = 'Speciální';

    public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }
}
