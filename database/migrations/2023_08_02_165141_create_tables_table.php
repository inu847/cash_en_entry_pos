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
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('number');
            $table->tinyInteger('capacity');
            $table->tinyInteger('status')->default(1)->comment('1=available, 2=reserved, 3=occupied, 4=unavailable');
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->unsignedBigInteger('bussiness_id')->index()->nullable();
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
        Schema::dropIfExists('tables');
    }
};
