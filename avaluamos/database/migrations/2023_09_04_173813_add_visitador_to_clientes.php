<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVisitadorToClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->integer('id_pais')->nullable()->unsigned()->after('objeto_avaluo');
            $table->integer('id_dpto_estado')->nullable()->unsigned()->after('id_pais');
            $table->string('cerca_de')->nullable()->after('sector');
            $table->string('unidad_edificio')->nullable()->after('barrio');
            $table->string('latitud')->nullable()->after('valor_cotizacion');
            $table->string('longitud')->nullable()->after('latitud');
            $table->integer('fecha_visita')->nullable()->unsigned()->after('id_visitado');
            $table->string('hora_visita')->nullable()->after('fecha_visita');
            $table->text('observaciones_inmueble')->nullable()->after('hora_visita');
            $table->integer('id_usuario')->nullable()->unsigned()->after('observaciones_inmueble');

            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
            $table->foreign('id_pais')->references('id_pais')->on('pais');
            $table->foreign('id_dpto_estado')->references('id_departamento_estado')->on('departamento_estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropColumn('id_pais');
            $table->dropColumn('id_dpto_estado');
            $table->dropColumn('cerca_de');
            $table->dropColumn('unidad_edificio');
            $table->dropColumn('latitud');
            $table->dropColumn('longitud');
            $table->dropColumn('fecha_visita');
            $table->dropColumn('hora_visita');
            $table->dropColumn('observaciones_inmueble');
            $table->dropColumn('id_usuario');
        });
    }
}
