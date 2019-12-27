<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductSku;
use Faker\Generator as Faker;

$factory->define(ProductSku::class, function (Faker $faker) {

  //   `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'SKU名称',
  // `description` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'SKU描述',
  // `attributes` json DEFAULT NULL COMMENT 'SKU属性',
  // `stock` int(10) unsigned NOT NULL COMMENT '库存',
  // `product_id` bigint(20) unsigned NOT NULL COMMENT '商品ID',
  // `price` decimal(8,2) NOT NULL COMMENT '商品价格',
  // `created_at` timestamp NULL DEFAULT NULL,

    return [
        'title' => $faker->word,
        'description' => $faker->sentence,
        'stock' => $faker->randomNumber(4),
        'price' => $faker->randomNumber(5),
    ];
});
