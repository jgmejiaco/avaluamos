<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionInmueble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificacion_inmueble', function (Blueprint $table) {
            $table->increments('id_calificacion_inmueble');
            $table->integer('id_visita')->nullable()->unsigned();
            $table->integer('cal_estructura')->nullable()->unsigned();
            $table->integer('cal_porton_ppal')->nullable()->unsigned();
            $table->integer('cal_fachada')->nullable()->unsigned();
            $table->integer('cal_puertas')->nullable()->unsigned();
            $table->integer('cal_muros')->nullable()->unsigned();
            $table->integer('cal_ventaneria')->nullable()->unsigned();
            $table->integer('cal_techos')->nullable()->unsigned();
            $table->integer('cal_carpinteria')->nullable()->unsigned();
            $table->integer('cal_pisos')->nullable()->unsigned();
            $table->integer('cal_ventilacion')->nullable()->unsigned();
            $table->integer('cal_cocina')->nullable()->unsigned();
            $table->integer('cal_iluminacion')->nullable()->unsigned();
            $table->integer('cal_banios')->nullable()->unsigned();
            $table->integer('cal_distribucion')->nullable()->unsigned();
            $table->integer('cal_zona_ropas')->nullable()->unsigned();
            $table->integer('cal_humedades')->nullable()->unsigned();
            $table->text('obs_calificacion_inmueble')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_visita')->references('id_visita')->on('visitas');
            $table->foreign('cal_estructura')->references('id_calificacion_general')->on('calificacion_general');
            $table->foreign('cal_porton_ppal')->references('id_calificacion_general')->on('calificacion_general');
            $table->foreign('cal_fachada')->references('id_calificacion_general')->on('calificacion_general');
            $table->foreign('cal_puertas')->references('id_calificacion_general')->on('calificacion_general');
            $table->foreign('cal_muros')->references('id_calificacion_general')->on('calificacion_general');
            $table->foreign('cal_ventaneria')->references('id_calificacion_general')->on('calificacion_general');
            $table->foreign('cal_techos')->references('id_calificacion_general')->on('calificacion_general');
            $table->foreign('cal_carpinteria')->references('id_calificacion_general')->on('calificacion_general');
            $table->foreign('cal_pisos')->references('id_calificacion_general')->on('calificacion_general');
            $table->foreign('cal_ventilacion')->references('id_calificacion_general')->on('calificacion_general');
            $table->foreign('cal_cocina')->references('id_calificacion_general')->on('calificacion_general');
            $table->foreign('cal_iluminacion')->references('id_calificacion_general')->on('calificacion_general');
            $table->foreign('cal_banios')->references('id_calificacion_general')->on('calificacion_general');
            $table->foreign('cal_distribucion')->references('id_calificacion_general')->on('calificacion_general');
            $table->foreign('cal_zona_ropas')->references('id_calificacion_general')->on('calificacion_general');
            $table->foreign('cal_humedades')->references('id_si_no')->on('si_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calificacion_inmueble');
    }
}
