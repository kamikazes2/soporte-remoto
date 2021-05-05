<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicioRealizarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicioRealizar', function (Blueprint $table) {
            $table->id();

            $table->foreignId("idServicio");
            $table->foreignId("idSolicitud");
            $table->float("precioFijado",8,2);
            $table->boolean("completado");
            $table->string("estado");

            //$table->primary(['idServicio','idSolicitud']);

            $table->foreign('idServicio')->references('id')->on('servicio');
            $table->foreign('idSolicitud')->references('id')->on('solicitudServicio');


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
        Schema::dropIfExists('servicioRealizar');
    }
}
