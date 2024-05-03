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
        Schema::create('employee_salaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id')->index();
            $table->unsignedBigInteger('bussiness_id')->index();
            $table->integer('type')->comment('1 = Basic (Static), 2 = Bonus, 3 = Allowance, 4 = Deduction, 5 = Over Time');
            $table->integer('amount');
            $table->date('date')->comment('hanya berlaku untuk selain Basic Salary guna untuk tracking kalkulasi fee tambahan harian');
            $table->integer('status')->comment('1 = active, 2 = inactive');
            $table->text('notes')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('employee_salaries');
    }
};
