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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_code');
            $table->string('customer_name');
            $table->string('customer_phone')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('customer_email')->nullable();
            $table->integer('total');
            $table->integer('discount')->nullable();
            $table->integer('tax')->nullable();
            $table->integer('grand_total');
            $table->integer('pay')->nullable();
            // PAID STATUS: 1=unpaid, 2=paid, 3=partial
            $table->dateTime('paid');
            $table->dateTime('due')->nullable();
            // TYPE: 1=dine in, 2=reservation, 3=take away, 4=delivery
            $table->integer('type');
            $table->text('note')->nullable();
            $table->dateTime('check_in')->nullable();
            $table->dateTime('check_out')->nullable();
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->unsignedBigInteger('bussiness_id')->index()->nullable();
            $table->unsignedBigInteger('table_id')->index()->nullable();
            $table->unsignedBigInteger('payment_id')->index()->nullable();
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
        Schema::dropIfExists('invoces');
    }
};
