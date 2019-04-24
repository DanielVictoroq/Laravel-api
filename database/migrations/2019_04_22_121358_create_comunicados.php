<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComunicados extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('comunicados', function (Blueprint $table) {
            $table->bigIncrements('id_comunicado');
            $table->longtext('comunicado');
            $table->string('titulo', 100);
            $table->int('id_condominio', 10);
            $table->foreign('id_condominio')->references('id_condominio')->on('condominio');
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
        Schema::dropIfExists('comunicados');
    }
}
