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
        Schema::create('tournament_restrictions', function (Blueprint $table) {
            $table->unsignedBigInteger('tournament_id');
            $table->unsignedBigInteger('restriction_id');
            $table->unique(['tournament_id', 'restriction_id']);
            $table->foreign('tournament_id')->references('id')->on('tournaments'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tournament_restrictions');
    }
};
