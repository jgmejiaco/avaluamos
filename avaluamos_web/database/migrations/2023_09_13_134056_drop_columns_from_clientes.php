<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnsFromClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropColumn('id_dirigido_a');
            $table->dropColumn('id_doc_empresa');
            $table->dropColumn('documento_empresa');
            $table->dropColumn('objeto_avaluo');
            $table->dropColumn('sector');
            $table->dropColumn('cerca_de');
            $table->dropColumn('barrio');
            $table->dropColumn('unidad_edificio');
            $table->dropColumn('direccion');
            $table->dropColumn('id_tipo_inmueble');
            $table->dropColumn('area');
            $table->dropColumn('id_estrato');
            $table->dropColumn('numero_inmueble');
            $table->dropColumn('id_cant_parqueaderos');
            $table->dropColumn('id_cant_cuarto_util');
            $table->dropColumn('id_cant_kioskos');
            $table->dropColumn('id_cant_piscinas');
            $table->dropColumn('id_cant_establos');
            $table->dropColumn('id_cant_billares');
            $table->dropColumn('porcentaje_descuento');
            $table->dropColumn('valor_cotizacion');
            $table->dropColumn('latitud');
            $table->dropColumn('longitud');
            $table->dropColumn('id_visitado');
            $table->dropColumn('fecha_visita');
            $table->dropColumn('hora_visita');
            $table->dropColumn('observaciones_inmueble');
            $table->dropColumn('id_usuario');
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
            //
        });
    }
}
