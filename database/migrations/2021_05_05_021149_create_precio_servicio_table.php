<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrecioServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precioServicio', function (Blueprint $table) {
            $table->id();

            $table->foreignId('idServicio'); 
            $table->foreign('idServicio')->references('id')->on('servicio');
            
            $table->dateTime("fecha");
            $table->float("precio",8,2);

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
        Schema::dropIfExists('precioServicio');
    }
}
