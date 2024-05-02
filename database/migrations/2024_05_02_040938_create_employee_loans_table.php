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
        Schema::create('employee_loans', function (Blueprint $table) {
            $table->id();
            $table->string('loan_number')->nullable();
            $table->date('loan_date')->nullable();
            $table->unsignedBigInteger('employee_id')->index();
            $table->text('description')->nullable();
            $table->integer('loan_amount');
            $table->integer('repayment_type')->nullable()->comment('1 = full payment, 2 = installment');
            $table->integer('repayment_term')->nullable()->comment('1 = weekly, 2 = monthly');
            $table->integer('installment_amount')->nullable();
            $table->string('approved_by')->nullable();
            $table->date('approved_at')->nullable();
            $table->string('declined_by')->nullable();
            $table->date('declined_at')->nullable();
            $table->string('reason')->nullable();
            $table->integer('loan_status')->default(1)->comment('1 = Waiting Approval, 2 = Approved, 3 = Rejected');
            $table->integer('repayment_status')->comment('1 = None, 2 = Ongoing, 3 = Paid, 4 = Canceled');
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
        Schema::dropIfExists('employee_loans');
    }
};
