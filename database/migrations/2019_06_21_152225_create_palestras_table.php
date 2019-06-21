<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePalestrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('palestras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->text('descricao');
            $table->date('data');
            $table->date('hora_inicio');
            $table->date('hora_fim');
            $table->string('local');
            
            $table->unsignedInteger('id_ministrante');
            $table->unsignedInteger('id_area');
            $table->foreign('id_ministrante')->references('id')->on('ministrantes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_area')->references('id')->on('areas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('palestras');
    }
}
