<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sku');
            $table->string('price');
            $table->string('purchase_price');
            $table->string('regular_price');
            $table->string('offer_price');
            $table->string('qty');
            $table->string('image');
            $table->text('description');
            $table->integer('stock_alert');
            $table->integer('status');
            $table->string('tax_type');
            $table->integer('free_shipping');
            $table->string('tags');
            $table->unsignedBigInteger('warehouse_id')->index()->nullable();
            $table->unsignedBigInteger('category_id')->index()->nullable();
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->unsignedBigInteger('ingredient_id')->index()->nullable();
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
};
