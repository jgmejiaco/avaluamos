<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPatiosToCalificacionInmueble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calificacion_inmueble', function (Blueprint $table) {
            $table->integer('cal_patios')->nullable()->unsigned()->after('cal_humedades');

            $table->foreign('cal_patios')->references('id_calificacion_general')->on('calificacion_general');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calificacion_inmueble', function (Blueprint $table) {
            $table->dropColumn('cal_patios');
        });
    }
}
