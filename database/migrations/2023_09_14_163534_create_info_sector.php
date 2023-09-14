<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoSector extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_sector', function (Blueprint $table) {
            $table->increments('id_info_sector');
            $table->integer('id_visita')->nullable()->unsigned();
            $table->string('barrios_sectores')->nullable();
            $table->integer('actividad_predominante')->nullable()->unsigned();
            $table->string('transporte')->nullable();
            $table->string('vias_acceso')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_visita')->references('id_visita')->on('visitas');
            $table->foreign('actividad_predominante')->references('id_uso_inmueble')->on('uso_inmueble');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_sector');
    }
}
