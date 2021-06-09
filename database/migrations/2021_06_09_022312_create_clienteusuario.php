<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteusuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clienteusuario', function (Blueprint $table) {
            $table->foreignId("idUsuario");
            $table->foreignId("idCliente");

            $table->foreign('idUsuario')->references('id')->on('users');
            $table->foreign('idCliente')->references('id')->on('cliente');
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
        Schema::dropIfExists('clienteusuario');
    }
}
