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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('accommodation_id');
            $table->string('gcash_qr');
            $table->string('gcash_name');
            $table->string('gcash_number');
            $table->string('maya_qr');
            $table->string('maya_name');
            $table->string('maya_number');
            $table->timestamps();

            $table->foreign('accommodation_id')->references('id')->on('accommodations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
