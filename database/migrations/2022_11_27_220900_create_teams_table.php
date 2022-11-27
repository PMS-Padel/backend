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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->dateTime('subscription_date'); //Colocar em table a parte
            $table->boolean('payed'); //Colocar em table a parte
            $table->unsignedBigInteger('player1_id');
            $table->unsignedBigInteger('player2_id');
            $table->timestamps();

            $table->foreign('player1_id')->references('id')->on('users');
            $table->foreign('player2_id')->references('id')->on('users');
            $table->unique(['player1_id', 'player2_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
};
