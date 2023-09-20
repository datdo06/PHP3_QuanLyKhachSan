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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('sdt')->nullable();
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->date('date_of_birth')->nullable();
            // 0 = user , 1 = admin
            $table->unsignedBigInteger('role_id')->default(1);

            $table->foreign('role_id')->references('id')->on('role');
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
