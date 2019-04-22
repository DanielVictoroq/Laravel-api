<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCondominio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condominio', function (Blueprint $table) {
            $table->bigIncrements('id_condominio');
            $table->string('nome_cond', 100);
            $table->float('valor_cond', 100);
            $table->float('vlr_agua', 100);
            $table->float('vlr_gas', 100);
            $table->float('med_agua', 100);
            $table->float('med_gas', 100);
            $table->float('vlr_total', 100);
            $table->float('vlr_caixa', 100);
            $table->string('sindico_atual', 100);
            $table->foreign('sindico_atual')->references('nome_usuario')->on('usuario');
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
        Schema::dropIfExists('condominio');
    }
}
