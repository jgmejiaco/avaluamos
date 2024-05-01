<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDotacionComunal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dotacion_comunal', function (Blueprint $table) {
            $table->increments('id_dotacion_comunal');
            $table->integer('id_visita')->nullable()->unsigned();
            $table->integer('porteria_24')->nullable()->unsigned();
            $table->integer('parqueo_comun')->nullable()->unsigned();
            $table->integer('juegos_infantiles')->nullable()->unsigned();
            $table->integer('zona_mascotas')->nullable()->unsigned();
            $table->integer('piscinas')->nullable()->unsigned();
            $table->integer('zonas_verdes')->nullable()->unsigned();
            $table->integer('sauna')->nullable()->unsigned();
            $table->integer('salon_social')->nullable()->unsigned();
            $table->integer('turco')->nullable()->unsigned();
            $table->integer('canchas')->nullable()->unsigned();
            $table->text('obs_dotacion_comunal')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_visita')->references('id_visita')->on('visitas');
            $table->foreign('porteria_24')->references('id_si_no')->on('si_no');
            $table->foreign('parqueo_comun')->references('id_si_no')->on('si_no');
            $table->foreign('juegos_infantiles')->references('id_si_no')->on('si_no');
            $table->foreign('zona_mascotas')->references('id_si_no')->on('si_no');
            $table->foreign('piscinas')->references('id_si_no')->on('si_no');
            $table->foreign('zonas_verdes')->references('id_si_no')->on('si_no');
            $table->foreign('sauna')->references('id_si_no')->on('si_no');
            $table->foreign('salon_social')->references('id_si_no')->on('si_no');
            $table->foreign('turco')->references('id_si_no')->on('si_no');
            $table->foreign('canchas')->references('id_si_no')->on('si_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dotacion_comunal');
    }
}
