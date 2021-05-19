<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecialidadPersonal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidadPersonal', function (Blueprint $table) {
            //$table->id();

            $table->foreignId("idPersonal");
            $table->foreignId("idEspecialidad");

            $table->foreign('idPersonal')->references('id')->on('personal');
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
        Schema::dropIfExists('especialidadPersonal');
    }
}
