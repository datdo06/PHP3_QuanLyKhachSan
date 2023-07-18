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
        Schema::create('khachsan', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_tinhthanh');

            $table->foreign('id_tinhthanh')->references('id')->on('tinhthanh');
            $table->string('image');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('description');
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
        Schema::dropIfExists('khachsan');
    }
};
