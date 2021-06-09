<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRechazoasignacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rechazoasignacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId("idTecnico");
            $table->foreignId("idAsignacionServicio");
            $table->foreign('idTecnico')->references('id')->on('tecnico');
            $table->foreign('idAsignacionServicio')->references('id')->on('asignacionservicio');
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
        Schema::dropIfExists('rechazoasignacion');
    }
}
