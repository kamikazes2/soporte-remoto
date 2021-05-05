<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimiento', function (Blueprint $table) {
            $table->id();

            $table->foreignId("idAsignacionServicio");
            $table->foreign('idAsignacionServicio')->references('id')->on('asignacionServicio');

            $table->unsignedInteger("idJefeTecnico"); // inventado por ahora
            $table->dateTime("fecha");
            $table->text("descripcion");

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
        Schema::dropIfExists('seguimiento');
    }
}
