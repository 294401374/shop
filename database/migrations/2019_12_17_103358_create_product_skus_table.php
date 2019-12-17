<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSkusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_skus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->comment('SKU名称');
            $table->text('description')->comment('SKU描述');
            $table->json('attributes')->comment('SKU属性');
            $table->unsignedInteger('stock')->comment('库存');
            $table->unsignedBigInteger('product_id')->comment('商品ID');
            $table->decimal('price', 8, 2)->comment('商品价格');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('product_skus');
    }
}
