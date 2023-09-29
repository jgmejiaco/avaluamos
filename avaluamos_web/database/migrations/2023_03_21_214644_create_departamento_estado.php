<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentoEstado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamento_estado', function (Blueprint $table) {
            $table->increments('id_departamento_estado');
            $table->string('descripcion_departamento')->nullable();
            $table->integer('id_estado')->nullable()->unsigned();
            $table->integer('id_pais')->nullable()->unsigned();
            $table->integer('id_ciudad')->nullable()->unsigned();
            $table->timestamps();
            $table->softdeletes();

            $table->foreign('id_estado')->references('id_estado')->on('estado');
            $table->foreign('id_ciudad')->references('id_ciudad')->on('ciudad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departamento_estado');
    }
}
