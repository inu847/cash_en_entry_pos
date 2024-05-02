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
        Schema::create('asked_questions', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->integer('status')->comment('1 = active, 2 = inactive');
            $table->integer('type')->comment('1 = general, 2 = help');
            $table->text('answer')->nullable();
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
        Schema::dropIfExists('asked_questions');
    }
};
