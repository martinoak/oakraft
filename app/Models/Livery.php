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

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeForSale($query)
    {
        return $query->where('for_sale', true);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%")
              ->orWhere('category', 'like', "%{$search}%")
              ->orWhere('tags', 'like', "%{$search}%");
        });
    }
}
