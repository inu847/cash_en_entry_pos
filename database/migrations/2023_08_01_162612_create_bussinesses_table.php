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
            $table->string("image");
            $table->string("email");
            $table->string("phone");
            $table->string("website")->nullable();
            $table->string("facebook")->nullable();
            $table->string("instagram")->nullable();
            $table->text("description")->nullable();
            $table->text("address")->nullable();
            $table->integer("status");
            $table->string("wifi_password")->nullable();
            
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
