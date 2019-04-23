<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcorrencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencias', function (Blueprint $table) {
            $table->bigIncrements('id_ocorrencia');
            $table->longtext('ocorrencia');
             $table->string('titulo', 100);
            $table->string('nome_usuario', 100);
            $table->foreign('nome_usuario')->references('nome_usuario')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ocorrencias');
    }
}
