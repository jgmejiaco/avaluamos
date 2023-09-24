<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCantidadesToCaracteristicasInmueble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('caracteristicas_inmueble', function (Blueprint $table) {
            $table->integer('cant_parqueaderos')->nullable()->unsigned()->after('shut_basura');
            $table->integer('cant_cuarto_util')->nullable()->unsigned()->after('cant_parqueaderos');
            $table->integer('cant_kioskos')->nullable()->unsigned()->after('cant_cuarto_util');
            $table->integer('cant_piscinas')->nullable()->unsigned()->after('cant_kioskos');
            $table->integer('cant_establos')->nullable()->unsigned()->after('cant_piscinas');
            $table->integer('cant_billares')->nullable()->unsigned()->after('cant_establos');
            $table->integer('cant_ascensores')->nullable()->unsigned()->after('cant_billares');

            $table->foreign('cant_parqueaderos')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('cant_cuarto_util')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('cant_kioskos')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('cant_piscinas')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('cant_establos')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('cant_billares')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('cant_ascensores')->references('id_indicador_numerico')->on('indicador_numerico');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('caracteristicas_inmueble', function (Blueprint $table) {
            $table->dropColumn('cant_parqueaderos');
            $table->dropColumn('cant_cuarto_util');
            $table->dropColumn('cant_kioskos');
            $table->dropColumn('cant_piscinas');
            $table->dropColumn('cant_establos');
            $table->dropColumn('cant_billares');
            $table->dropColumn('cant_ascensores');
        });
    }
}
