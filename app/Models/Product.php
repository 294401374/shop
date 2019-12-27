<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'description', 'price', 'img', 'rating', 'on_sale', 'sold_count', 'review_count'
    ];
    protected $casts = [
        'on_sale' => 'boolean', //on_sale 是一个布尔类型的字段
    ];

    public function skus()
    {
        return $this->hasMany(ProductSku::class);
    }

    public function getImgUrlAttribute()
    {
        if (Str::startsWith($this->attributes['img'], ['http://', 'https://'])) {
            return $this->attributes['img'];
        }
        return \Storage::disk('public')->url($this->attributes['img']);
    }
}
