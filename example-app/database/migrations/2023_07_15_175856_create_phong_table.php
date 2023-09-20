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
        Schema::create('phong', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('image');
            $table->string('price');
            $table->unsignedBigInteger('id_vitri');
            $table->foreign('id_vitri')->references('id')->on('vitri');

            $table->unsignedBigInteger('id_loaiphong');
            $table->foreign('id_loaiphong')->references('id')->on('loaiphong');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('phong');
    }
};
