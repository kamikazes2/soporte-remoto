<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecialidadServicio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidadServicio', function (Blueprint $table) {
            //$table->id();

            $table->foreignId("idServicio");
            $table->foreignId("idEspecialidad");

            $table->foreign('idServicio')->references('id')->on('servicio');
            $table->foreign('idEspecialidad')->references('id')->on('especialidad');

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
        Schema::dropIfExists('especialidadServicio');
    }
}
