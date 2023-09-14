<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondicionesUrbanisticas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condiciones_urbanisticas', function (Blueprint $table) {
            $table->increments('id_condiciones_urbanisticas');
            $table->integer('id_visita')->nullable()->unsigned();
            $table->integer('id_valorizacion')->nullable()->unsigned();
            $table->integer('cu_alumbrado_publico')->nullable()->unsigned();
            $table->integer('cu_transporte')->nullable()->unsigned();
            $table->integer('cu_orden_publico')->nullable()->unsigned();
            $table->integer('cu_seguridad')->nullable()->unsigned();
            $table->integer('cu_salubridad')->nullable()->unsigned();
            $table->integer('cu_vias')->nullable()->unsigned();
            $table->integer('id_tipo_vias')->nullable()->unsigned();
            $table->text('cu_barrios_sectores')->nullable();
            $table->text('cu_tipo_edificaciones')->nullable();
            $table->text('obs_condiciones_urbanisticas')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_visita')->references('id_visita')->on('visitas');
            $table->foreign('id_valorizacion')->references('id_valorizacion')->on('valorizacion');
            $table->foreign('cu_alumbrado_publico')->references('id_calificacion_general')->on('calificacion_general');
            $table->foreign('cu_transporte')->references('id_calificacion_general')->on('calificacion_general');
            $table->foreign('cu_orden_publico')->references('id_calificacion_general')->on('calificacion_general');
            $table->foreign('cu_seguridad')->references('id_calificacion_general')->on('calificacion_general');
            $table->foreign('cu_salubridad')->references('id_calificacion_general')->on('calificacion_general');
            $table->foreign('cu_vias')->references('id_calificacion_general')->on('calificacion_general');
            $table->foreign('id_tipo_vias')->references('id_tipo_vias')->on('tipo_vias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('condiciones_urbanisticas');
    }
}
