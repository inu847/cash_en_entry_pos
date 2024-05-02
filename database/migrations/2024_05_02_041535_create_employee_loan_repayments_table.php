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
        Schema::create('employee_loan_repayments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_loan_id')->index();
            $table->unsignedBigInteger('payroll_id')->index();
            $table->date('repayment_date')->nullable();
            $table->text('description')->nullable();
            $table->decimal('amount', 10, 2);
            $table->integer('status')->comment('1 = Pending, 2 = Verified');
            $table->boolean('is_paid')->default(0);
            $table->text('reason')->nullable();
            $table->integer('source')->comment('1 = Payroll, 2 = Others');
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
        Schema::dropIfExists('employee_loan_repayments');
    }
};
