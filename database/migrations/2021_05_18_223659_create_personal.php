<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->id();
            $table->foreignId("idUsuario");
            $table->foreign('idUsuario')->references('id')->on('users');
            $table->string("dni");
            $table->string("nombre");
            $table->string("apellido");
            $table->dateTime("fechaNacimiento");
            $table->boolean("disponible");
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
        Schema::dropIfExists('personal');
    }
}
