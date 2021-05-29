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
            $table->foreignId("idServicioRealizar");
            $table->foreign('idServicioRealizar')->references('id')->on('serviciorealizar');
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
