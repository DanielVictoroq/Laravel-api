<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicoAdicional extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servico_adicional', function (Blueprint $table) {
            $table->bigIncrements('id_servico');
            $table->string('tipo_servico', 50);
            $table->string('descricao', 255);
            $table->float('vlr_servico');
            $table->integer('meio_pgt');
            $table->integer('pagamento');
            $table->bigInteger('id_condominio')->unsigned();
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
        Schema::dropIfExists('servico_adicional');
    }
}
