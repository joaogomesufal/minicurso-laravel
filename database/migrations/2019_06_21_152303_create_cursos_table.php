<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->text('descricao');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->string('local');
            $table->integer('quantidade_votos');
            $table->float('carga_horaria', 2);
            $table->float('nota');

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
        Schema::dropIfExists('cursos');
    }
}
