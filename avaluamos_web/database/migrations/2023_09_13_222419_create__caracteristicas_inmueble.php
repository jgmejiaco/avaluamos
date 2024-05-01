<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaracteristicasInmueble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristicas_inmueble', function (Blueprint $table) {
            $table->increments('id_caracteristicas_inmueble');
            $table->integer('id_visita')->nullable()->unsigned();
            $table->integer('cocinas')->nullable()->unsigned();
            $table->integer('habitaciones')->nullable()->unsigned();
            $table->integer('salas')->nullable()->unsigned();
            $table->integer('habitaciones_servicio')->nullable()->unsigned();
            $table->integer('comedores')->nullable()->unsigned();
            $table->integer('banios_servicio')->nullable()->unsigned();
            $table->integer('banios_social')->nullable()->unsigned();
            $table->integer('banios_privado')->nullable()->unsigned();
            $table->integer('balcones')->nullable()->unsigned();
            $table->integer('zona_ropa')->nullable()->unsigned();
            $table->integer('estudios')->nullable()->unsigned();
            $table->integer('patios')->nullable()->unsigned();
            $table->integer('vestier')->nullable()->unsigned();
            $table->integer('escala_emergencia')->nullable()->unsigned();
            $table->integer('closets')->nullable()->unsigned();
            $table->integer('shut_basura')->nullable()->unsigned();
            $table->text('obs_caract_inmueble')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_visita')->references('id_visita')->on('visitas');
            $table->foreign('cocinas')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('habitaciones')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('salas')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('habitaciones_servicio')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('comedores')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('banios_servicio')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('banios_social')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('banios_privado')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('balcones')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('zona_ropa')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('estudios')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('patios')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('vestier')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('escala_emergencia')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('closets')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('shut_basura')->references('id_indicador_numerico')->on('indicador_numerico');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caracteristicas_inmueble');
    }
}
