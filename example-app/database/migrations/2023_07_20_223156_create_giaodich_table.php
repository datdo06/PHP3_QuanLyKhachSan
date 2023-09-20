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
        Schema::create('giaodich', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_datphong');
            $table->foreign('id_datphong')->references('id')->on('datphong');

            $table->unsignedBigInteger('id_dichvu');
            $table->foreign('id_dichvu')->references('id')->on('dichvu');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->integer('total');
            $table->date('date_of_payment');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('giaodich');
    }
};
