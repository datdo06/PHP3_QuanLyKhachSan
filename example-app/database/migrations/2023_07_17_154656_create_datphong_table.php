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
        Schema::create('datphong', function (Blueprint $table) {
            $table->id('id');

            $table->unsignedBigInteger('id_phong');
            $table->foreign('id_phong')->references('id')->on('phong');

            $table->unsignedBigInteger('id_account');
            $table->foreign('id_account')->references('id')->on('accounts');
            $table->date('date_of_hire');
            $table->date('end_date');
            $table->float('total');
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
        Schema::dropIfExists('datphong');
    }
};
