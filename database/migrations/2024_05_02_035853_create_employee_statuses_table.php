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
        Schema::create('employee_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Freelance, Part Time, Full Time, Contract, Dismissal');
            $table->text('description')->nullable();
            $table->integer('status')->comment('1 = active, 2 = inactive');
            $table->unsignedBigInteger('bussiness_id')->index();
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
        Schema::dropIfExists('employee_statuses');
    }
};
