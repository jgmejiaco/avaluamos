<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPisosEdificioToInfoInmueble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info_inmueble', function (Blueprint $table) {
           $table->integer('pisos_edificio')->nullable()->unsigned()->after('pisos_inmueble');

           $table->foreign('pisos_edificio')->references('id_indicador_numerico')->on('indicador_numerico');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('info_inmueble', function (Blueprint $table) {
        $table->dropColumn('pisos_edificio');
        });
    }
}
