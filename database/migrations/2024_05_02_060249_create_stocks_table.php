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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bussiness_id')->index()->nullable();
            
            $table->string('pic');
            $table->string('pic_phone');
            $table->integer('qty');
            $table->string('image')->nullable();
            $table->integer('type')->comment('1 = stock_in, 2 = stock_out');
            $table->string('send_by');
            $table->string('received_by');
            $table->text('notes')->nullable();

            // BARANG BISA BERUPA
            $table->unsignedBigInteger('product_id')->index()->nullable();
            $table->unsignedBigInteger('ingredient_id')->index()->nullable();
            // JIKA SUPPLY BARANG DARI WAREHOUSE
            $table->unsignedBigInteger('from_warehouse_id')->index()->nullable();
            $table->unsignedBigInteger('to_warehouse_id')->index()->nullable();
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
        Schema::dropIfExists('stocks');
    }
};
