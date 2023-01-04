<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('Games', function (Blueprint $table) {
            $table->unsignedBigInteger('Campo_id')->unique();
            $table->date('start_at')->unique();
            $table->date('day')->nullable();
            $table->unsignedBigInteger("team_id1")->nullable();
            $table->unsignedBigInteger("team_id2")->nullable();
            $table->unsignedBigInteger("team1_points")->nullable();
            $table->unsignedBigInteger("team2_points")->nullable();
            $table->unsignedBigInteger("winner_id")->nullable();
            $table->unsignedBigInteger("team1_name")->nullable();
            $table->unsignedBigInteger("team2_name")->nullable();
            $table->foreign('Campo_id')->references('id')->on('courts'); 
        });
    }
     /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Game');
    }
};
