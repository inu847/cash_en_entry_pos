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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->integer('status')->comment('1 = active, 2 = inactive');
            $table->integer('type')->comment('1 = product, 2 = service');
            $table->integer('max_qty')->nullable();
            $table->integer('discount');
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->string('title')->nullable();
            $table->date('expired_at')->nullable();
            $table->date('start_at')->nullable();
            $table->unsignedBigInteger('bussiness_id')->index()->nullable()->comment('optional field jika voucher di gunakan di bussiness maka ada potongan produk');
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
        Schema::dropIfExists('vouchers');
    }
};
