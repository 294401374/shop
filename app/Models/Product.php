<?php

namespace App\Models;

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
        return $this->hasManys(ProductSku::class);
    }
}
