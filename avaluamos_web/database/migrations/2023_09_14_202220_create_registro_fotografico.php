<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroFotografico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_fotografico', function (Blueprint $table) {
            $table->increments('id_reg_foto');
            $table->integer('id_visita')->nullable()->unsigned();
            $table->string('rf_fachada')->nullable();
            $table->string('rf_entrada')->nullable();
            $table->string('rf_sala1')->nullable();
            $table->string('rf_sala2')->nullable();
            $table->string('rf_sala3')->nullable();
            $table->string('rf_comedor1')->nullable();
            $table->string('rf_comedor2')->nullable();
            $table->string('rf_comedor3')->nullable();
            $table->string('rf_cocina1')->nullable();
            $table->string('rf_cocina2')->nullable();
            $table->string('rf_cocina3')->nullable();
            $table->string('rf_habitacion1')->nullable();
            $table->string('rf_habitacion2')->nullable();
            $table->string('rf_habitacion3')->nullable();
            $table->string('rf_habitacion4')->nullable();
            $table->string('rf_habitacion5')->nullable();
            $table->string('rf_habitacion6')->nullable();
            $table->string('rf_habitacion7')->nullable();
            $table->string('rf_bano1')->nullable();
            $table->string('rf_bano2')->nullable();
            $table->string('rf_bano3')->nullable();
            $table->string('rf_patio1')->nullable();
            $table->string('rf_patio2')->nullable();
            $table->string('rf_patio3')->nullable();
            $table->string('rf_estudio1')->nullable();
            $table->string('rf_estudio2')->nullable();
            $table->string('rf_estudio3')->nullable();
            $table->string('rf_cuarto_util1')->nullable();
            $table->string('rf_cuarto_util2')->nullable();
            $table->string('rf_cuarto_util3')->nullable();
            $table->string('rf_pasillo1')->nullable();
            $table->string('rf_pasillo2')->nullable();
            $table->string('rf_pasillo3')->nullable();
            $table->string('rf_zona_ropa1')->nullable();
            $table->string('rf_zona_ropa2')->nullable();
            $table->string('rf_zona_ropa3')->nullable();
            $table->string('rf_balcon1')->nullable();
            $table->string('rf_balcon2')->nullable();
            $table->string('rf_balcon3')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_visita')->references('id_visita')->on('visitas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro_fotografico');
    }
}
