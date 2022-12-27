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
            $table->unsignedInteger('Slot_id', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]);
            $table->date('Data');
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
