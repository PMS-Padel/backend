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
      
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->date('init_date');
            $table->date('end_date');
            $table->string('location')->nullable();
            $table->decimal('price', 8, 2, true)->nullable();
            $table->integer('max_players');
            $table->unsignedBigInteger('tournament_type_id');
            $table->string('file_url')->nullable();
            $table->timestamps();
            $table->softDeletes();

            
            $table->foreign('tournament_type_id')->references('id')->on('tournament_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tournaments');
    }
};
