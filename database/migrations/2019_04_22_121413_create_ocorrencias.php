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
            $table->int('id_condominio', 10);
            $table->foreign('id_condominio')->references('id_condominio')->on('condominio');
            $table->string('nome_usuario', 100);
            $table->foreign('nome_usuario')->references('nome_usuario')->on('usuario');
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
        Schema::dropIfExists('ocorrencias');
    }
}
