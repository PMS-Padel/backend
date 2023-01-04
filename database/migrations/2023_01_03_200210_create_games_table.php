<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tourney_id');
            $table->unsignedBigInteger('campo_id')->nullable();
            $table->timestamp('start_at')->nullable();
            $table->unsignedBigInteger("team_id1")->nullable();
            $table->unsignedBigInteger("team_id2")->nullable();
            $table->unsignedBigInteger("team1_points")->nullable();
            $table->unsignedBigInteger("team2_points")->nullable();
            $table->unsignedBigInteger("winner_id")->nullable();
            $table->timestamps();

            $table->foreign('campo_id')->references('id')->on('courts'); 
            $table->foreign('tourney_id')->references('id')->on('tournaments');
            $table->foreign('team_id1')->references('id')->on('teams');
            $table->foreign('team_id2')->references('id')->on('teams');
            $table->foreign('winner_id')->references('id')->on('teams');
            $table->softDeletes();
        });
    }
     /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
};
