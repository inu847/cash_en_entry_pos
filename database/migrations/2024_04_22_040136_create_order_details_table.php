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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            // BISA DARI VOUCHER MAUPUN DISKON LANGSUNG DARI ADMIN
            $table->integer('discount')->nullable();
            $table->integer('total');
            $table->integer('qty');
            $table->unsignedBigInteger('product_id')->index();
            $table->unsignedBigInteger('order_id')->index();
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
        Schema::dropIfExists('order_details');
    }
};
