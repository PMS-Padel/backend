<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('Campos_disponibilidade', function (Blueprint $table) {
            $table->unsignedBigInteger('Campo_id');
            $table->date('start_at');
            $table->unique(['Campo_id, Hora_id, Dia_id']);
            $table->foreign('Campo_id')->references('id')->on('Campos_disponibilidade'); 
        });
    }
     /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Campos_disponibilidade');
    }
};
