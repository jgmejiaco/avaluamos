<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiudad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciudad', function (Blueprint $table) {
            $table->increments('id_ciudad');
            $table->string('descripcion_ciudad')->nullable();
            $table->string('barrio')->nullable();
            $table->string('comuna')->nullable();
            $table->integer('estrato')->nullable()->unsigned();
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->integer('id_estado')->nullable()->unsigned();
            $table->integer('id_departamento_estado')->nullable()->unsigned();
            $table->timestamps();
            $table->softdeletes();

            $table->foreign('id_estado')->references('id_estado')->on('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ciudad');
    }
}
