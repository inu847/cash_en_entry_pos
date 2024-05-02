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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->string('payroll_number')->nullable();
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->string('period')->nullable();
            $table->boolean('is_team')->nullable()->default(0);
            $table->unsignedBigInteger('employee_id')->index()->nullable();
            $table->string('employee_number')->nullable();
            $table->string('employee_name')->nullable();
            $table->string('department')->nullable();
            $table->string('position')->nullable();
            $table->unsignedBigInteger('team_id')->index()->nullable();
            $table->string('team_name')->nullable();
            $table->string('lead_name')->nullable();
            $table->boolean('is_published')->nullable()->comment('publish means cant edit data');
            $table->boolean('is_locked')->nullable()->comment('locked means cant edit data');
            $table->string('payroll_status')->comment('1 = Draft, 2 = Waiting Approval, 3 = Need Revision, 4 = Published');
            $table->text('revision_note')->nullable();
            $table->unsignedBigInteger('generated_by')->index()->comment('relation users table')->nullable();
            $table->dateTime('generated_at')->nullable();
            $table->string('approved_by')->nullable();
            $table->dateTime('approved_at')->nullable();
            $table->unsignedBigInteger('created_by')->index()->nullable()->comment('relation users table');
            $table->unsignedBigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('payrolls');
    }
};
