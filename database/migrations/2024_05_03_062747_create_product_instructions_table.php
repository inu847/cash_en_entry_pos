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
        Schema::create('product_instructions', function (Blueprint $table) {
            $table->id();
            $table->text('instruction');
            $table->integer('type')->default(1)->comment('1 = required, 2 = optional');
            $table->unsignedBigInteger('product_id')->index();
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
        Schema::dropIfExists('product_instructions');
    }
};
