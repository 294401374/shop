<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $imgs = [
        "https://cdn.learnku.com/uploads/images/201806/01/5320/7kG1HekGK6.jpg",
        "https://cdn.learnku.com/uploads/images/201806/01/5320/1B3n0ATKrn.jpg",
        "https://cdn.learnku.com/uploads/images/201806/01/5320/r3BNRe4zXG.jpg",
        "https://cdn.learnku.com/uploads/images/201806/01/5320/C0bVuKB2nt.jpg",
        "https://cdn.learnku.com/uploads/images/201806/01/5320/82Wf2sg8gM.jpg",
        "https://cdn.learnku.com/uploads/images/201806/01/5320/nIvBAQO5Pj.jpg",
        "https://cdn.learnku.com/uploads/images/201806/01/5320/XrtIwzrxj7.jpg",
        "https://cdn.learnku.com/uploads/images/201806/01/5320/uYEHCJ1oRp.jpg",
        "https://cdn.learnku.com/uploads/images/201806/01/5320/2JMRaFwRpo.jpg",
        "https://cdn.learnku.com/uploads/images/201806/01/5320/pa7DrV43Mw.jpg",
    ];
    $img = $faker->RandomElement($imgs);
  //   id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  // `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品名称',
  // `description` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品描述',
  // `price` decimal(8,2) NOT NULL COMMENT 'SKU 最低价格',
  // `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品封面图',
  // `on_sale` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否在销售。1是，0否。',
  // `sold_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '销售量',
  // `review_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '品论数量',
  // `rating` double(8,2) NOT NULL DEFAULT '5.00' COMMENT '评分',

    return [
        'title'         => $faker->word,
        'description'   => $faker->sentence,
        'img'           => $img,
        'rating'        => $faker->numberBetween(0, 5),
        'on_sale'       => true,
        'price'         => 0,
        'sold_count'    => 0,
        'review_count'  => 0,

    ];
});
