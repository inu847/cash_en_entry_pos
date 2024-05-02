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
        Schema::create('bussinesses', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("logo")->nullable();
            $table->string("email");
            $table->string("phone");
            $table->string("website")->nullable();
            $table->string("facebook")->nullable();
            $table->string("instagram")->nullable();
            $table->text("description")->nullable();
            $table->text("address")->nullable();
            $table->integer("status");
            $table->string("wifi_password")->nullable();
            $table->string('custom_domain')->nullable();
            $table->string('sub_domain')->nullable();
            $table->integer('type')->default(1)->comment('1 = Standart, 2 = FoodCourt, 3 = Retail');
            // TAX STATUS
            $table->boolean("tax_status")->default(0)->comment('0 = non tax, 1 = tax');
            $table->integer("tax")->nullable()->comment('10 = 10%');
            $table->unsignedBigInteger('user_id')->index()->nullable();
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
        Schema::dropIfExists('bussinesses');
    }
};
