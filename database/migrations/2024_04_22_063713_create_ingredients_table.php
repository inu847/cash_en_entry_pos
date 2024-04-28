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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('status')->comment('1 = active, 2 = inactive');
            $table->integer('type')->comment('1 = product, 2 = service');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('price')->nullable();
            $table->integer('weight')->nullable();
            $table->string('uom')->nullable();
            $table->string('note')->nullable();
            $table->unsignedBigInteger('warehouse_id')->index()->nullable();
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
        Schema::dropIfExists('ingredients');
    }
};
