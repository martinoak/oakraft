<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livery extends Model
{
    protected $fillable = [
        'name',
        'airline',
        'type',
        'price',
        'category',
        'featured',
        'on_sale'
    ];

    protected $casts = [
        'featured' => 'boolean',
        'on_sale' => 'boolean',
        'price' => 'decimal:2',
    ];

    public function getTagsArrayAttribute()
    {
        return $this->tags ? explode(',', $this->tags) : [];
    }

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
