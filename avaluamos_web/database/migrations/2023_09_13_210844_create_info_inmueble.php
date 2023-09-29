<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoInmueble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_inmueble', function (Blueprint $table) {
            $table->increments('id_info_inmueble');
            $table->integer('id_visita')->nullable()->unsigned();
            $table->integer('id_tipo_inmueble')->nullable()->unsigned();
            $table->integer('id_tipo_vivienda')->nullable()->unsigned();
            $table->integer('id_uso_inmueble')->nullable()->unsigned();
            $table->integer('id_tipo_suelo')->nullable()->unsigned();
            $table->integer('id_topografia')->nullable()->unsigned();
            $table->integer('id_forma')->nullable()->unsigned();
            $table->integer('numero_pisos')->nullable()->unsigned();
            $table->string('valor_administracion')->nullable();
            $table->string('barrio')->nullable();
            $table->integer('remodelado')->nullable()->unsigned();
            $table->string('altura')->nullable();
            $table->string('frente')->nullable();
            $table->string('fondo')->nullable();
            $table->string('area_libre')->nullable();
            $table->string('anios_construccion')->nullable();
            $table->string('anios_remodelacion')->nullable();
            $table->string('area_construida')->nullable();
            $table->string('area_patios')->nullable();
            $table->integer('id_condicion_inmueble')->nullable()->unsigned();
            $table->string('porcentaje_depreciacion')->nullable();
            $table->integer('id_fitto_corvini')->nullable()->unsigned();
            $table->string('vida_util_anios')->nullable();
            $table->string('vetustez_anios')->nullable();
            $table->string('vida_permanente_anios')->nullable();
            $table->text('obs_info_inmueble')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_visita')->references('id_visita')->on('visitas');
            $table->foreign('id_tipo_inmueble')->references('id_tipo_inmueble')->on('tipo_inmueble');
            $table->foreign('id_tipo_vivienda')->references('id_tipo_vivienda')->on('tipo_vivienda');
            $table->foreign('id_uso_inmueble')->references('id_uso_inmueble')->on('uso_inmueble');
            $table->foreign('id_tipo_suelo')->references('id_tipo_suelo')->on('tipo_suelo');
            $table->foreign('id_topografia')->references('id_topografia')->on('topografia');
            $table->foreign('id_forma')->references('id_forma')->on('forma');
            $table->foreign('numero_pisos')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('remodelado')->references('id_si_no')->on('si_no');
            $table->foreign('id_condicion_inmueble')->references('id_condicion_inmueble')->on('condicion_inmueble');
            $table->foreign('id_fitto_corvini')->references('id_fitto_corvini')->on('fitto_corvini');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_inmueble');
    }
}
