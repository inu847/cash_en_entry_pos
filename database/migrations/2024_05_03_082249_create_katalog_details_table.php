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
        Schema::create('katalog_details', function (Blueprint $table) {
            $table->id();
            $table->integer('katalog_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('status')->default(1)->comment('1 = active, 2 = inactive');
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
        Schema::dropIfExists('katalog_details');
    }
};
