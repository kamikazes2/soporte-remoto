<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarjeta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarjeta', function (Blueprint $table) {
            $table->id();
            $table->foreignId("idCliente");
            $table->foreign('idCliente')->references('id')->on('cliente');
            $table->string("nombre");
            $table->string("numero");
            $table->string("mes");
            $table->string("anio");
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
        Schema::dropIfExists('tarjeta');
    }
}
