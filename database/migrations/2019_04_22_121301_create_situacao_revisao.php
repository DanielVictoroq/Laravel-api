<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSituacaoRevisao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('situacao_revisao', function (Blueprint $table) {
            $table->bigIncrements('id_situacao');
            $table->string('nome', 50);
            $table->date('ult_revisao');
            $table->date('data_prox_revisao');
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
        Schema::dropIfExists('situacao_revisao');
    }
}
