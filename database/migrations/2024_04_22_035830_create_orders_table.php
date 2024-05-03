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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number');
            $table->string('name')->nullable();
            $table->integer('total_qty');
            $table->integer('total_price');
            $table->integer('total_discount')->nullable();
            $table->integer('status')->default(1)->comment('1 = pending,2 = process,3 = success, 4 = cancel');
            $table->integer('payment')->default(1)->comment('1 = pending,2 = process,3 = success, 4 = cancel');
            $table->integer('type')->comment('1 = dine in, 2 = reservation, 3 = take away, 4 = delivery, 5 = online');
            $table->text('note')->nullable();
            $table->string('code')->nullable()->comment('untuk menampung virtual account number');
            $table->unsignedBigInteger('payment_id')->index();
            $table->unsignedBigInteger('user_id')->index();
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
        Schema::dropIfExists('orders');
    }
};
