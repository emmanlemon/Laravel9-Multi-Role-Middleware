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
    // public function up()
    // {
    //     Schema::create('shops', function (Blueprint $table) {
    //         $table->id();
    //         $table->unsignedBigInteger('user_role_id');
    //         $table->foreign('user_role_id')
    //                 ->references('role')->on('users')
    //                 ->onDelete('cascade');
    //         $table->unsignedBigInteger('users_id');
    //         $table->foreign('users_id')
    //                 ->references('id')->on('users')
    //                 ->onDelete('cascade');
    //         $table->string('status')->default(0);
    //         $table->string('logo')->default('default.png');
    //         $table->timestamps();
    //     });
    // }
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('shop_name');
            $table->unsignedBigInteger('user_role_id')->default(2);
            $table->foreign('user_role_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('status')->default(0);
            $table->string('logo')->default('default.png');
            $table->string('address');
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
        Schema::dropIfExists('shops');
    }
};
