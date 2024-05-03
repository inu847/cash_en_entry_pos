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
        Schema::create('employee_attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->unsignedBigInteger('bussiness_id')->nullable();
            $table->date('date')->nullable();
            $table->dateTime('clock_in')->nullable();
            $table->string('clock_in_photo')->nullable();
            $table->string('clock_in_long')->nullable();
            $table->string('clock_in_lat')->nullable();
            $table->dateTime('clock_out')->nullable();
            $table->string('clock_out_photo')->nullable();
            $table->string('clock_out_long')->nullable();
            $table->string('clock_out_lat')->nullable();
            $table->integer('status')->nullable()->comment('1 = ontime, 2 = half day, 3 = zero wage');
            $table->string('platform')->nullable()->comment('web, mobile');
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
        Schema::dropIfExists('employee_attendances');
    }
};
