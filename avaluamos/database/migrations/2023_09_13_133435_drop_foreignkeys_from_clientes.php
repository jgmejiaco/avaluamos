<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropForeignkeysFromClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropForeign(['id_dirigido_a']);
            $table->dropForeign(['id_doc_empresa']);
            $table->dropForeign(['id_tipo_inmueble']);
            $table->dropForeign(['id_estrato']);
            $table->dropForeign(['id_cant_parqueaderos']);
            $table->dropForeign(['id_cant_cuarto_util']);
            $table->dropForeign(['id_cant_kioskos']);
            $table->dropForeign(['id_cant_piscinas']);
            $table->dropForeign(['id_cant_establos']);
            $table->dropForeign(['id_cant_billares']);
            $table->dropForeign(['id_visitado']);
            $table->dropForeign(['id_usuario']);
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
