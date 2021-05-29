<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNitTributario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NitTributario', function (Blueprint $table) {
            $table->id();
            $table->foreignId("idCliente");
            $table->foreign('idCliente')->references('id')->on('cliente');
            $table->string("nit");
            $table->string("nombre");
            $table->String("tipo");
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
        Schema::dropIfExists('NitTributario');
    }
}
