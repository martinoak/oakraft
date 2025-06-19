<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livery extends Model
{
    protected $fillable = [
        'aircraft',
        'airline',
        'IATA',
        'type',
        'path',
        'price_jpg',
        'price_png',
        'category',
        'featured',
        'on_sale',
        'discount_jpg',
        'discount_png'
    ];

    protected $casts = [
        'featured' => 'boolean',
        'on_sale' => 'boolean',
        'price_jpg' => 'decimal:2',
        'price_png' => 'decimal:2',
        'discount_jpg' => 'decimal:2',
        'discount_png' => 'decimal:2',
    ];
}
