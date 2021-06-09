<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleFactura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DetalleFactura', function (Blueprint $table) {
            $table->id();
            $table->foreignId("idFactura");
            $table->foreign('idFactura')->references('id')->on('factura');
            $table->foreignId("idSolicitudServicio");
            $table->foreign('idSolicitudServicio')->references('id')->on('solicitudservicio');
            $table->string("nroPago");
            $table->decimal("monto",8,2);
            $table->decimal("detalle");
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
        Schema::dropIfExists('DetalleFactura');
    }
}
