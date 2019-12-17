<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->comment('商品名称');
            $table->text('description')->comment('商品描述');
            $table->decimal('price', 8, 2)->comment('SKU 最低价格');
            $table->string('img')->comment('商品封面图');
            $table->tinyInteger('on_sale')->default(1)->comment('是否在销售。1是，0否。');
            $table->unsignedInteger('sold_count')->default(0)->comment('销售量');
            $table->unsignedInteger('review_count')->default(0)->comment('品论数量');
            $table->float('rating')->default(5)->comment('评分');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
