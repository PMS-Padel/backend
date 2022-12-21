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
        //tabela relação que contem unicamente associações entre o id da equipa com as respetivas restrições
        // n records conforme nº n de restrições
        Schema::create('teams_restrictions', function (Blueprint $table) {
            $table->unsignedBigInteger('teams_id');
            $table->unsignedBigInteger('restriction_id');
            $table->unique(['teams_id', 'restriction_id']);
            $table->foreign('teams_id')->references('id')->on('teams'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams_restrictions');
    }
};
