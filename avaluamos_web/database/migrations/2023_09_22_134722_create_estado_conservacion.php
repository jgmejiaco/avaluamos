<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadoConservacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_conservacion', function (Blueprint $table) {
            $table->increments('id_estado_conservacion');
            $table->string('estado_conservacion')->nullable();
            $table->integer('id_visita')->nullable()->unsigned();
            $table->integer('id_factor_calidad')->nullable()->unsigned();
            $table->integer('id_factor_zona')->nullable()->unsigned();
            $table->integer('id_factor_tiempo')->nullable()->unsigned();
            $table->integer('id_factor_pendiente')->nullable()->unsigned();
            $table->string('valor_pendiente')->nullable();
            $table->integer('id_factor_ubicacion')->nullable()->unsigned();
            $table->string('valor_ubicacion')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_visita')->references('id_visita')->on('visitas');
            $table->foreign('id_factor_calidad')->references('id_factor_calidad')->on('factor_calidad_zonas_comunes');
            $table->foreign('id_factor_zona')->references('id_factor_zona')->on('factor_zona');
            $table->foreign('id_factor_tiempo')->references('id_factor_tiempo')->on('factor_tiempo');
            $table->foreign('id_factor_pendiente')->references('id_factor_pendiente')->on('factor_pendiente');
            $table->foreign('id_factor_ubicacion')->references('id_factor_ubicacion')->on('factor_ubicacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estado_conservacion');
    }
}
