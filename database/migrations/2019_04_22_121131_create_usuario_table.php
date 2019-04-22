<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->string('nome_usuario', 100);
            $table->primary('nome_usuario');
            $table->string('nome', 100);
            $table->string('sobrenome', 100);
            $table->string('id_tipo', 50);
            $table->date('data_nascimento');
            $table->string('telefone', 100);
            $table->string('login', 100);
            $table->foreign('login')->references('nome_usuario')->on('users');
            $table->foreign('login')->references('nome_usuario')->on('admin');
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
        Schema::dropIfExists('usuario');
    }
}
