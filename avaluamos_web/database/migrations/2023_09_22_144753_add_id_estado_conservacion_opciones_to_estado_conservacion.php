<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdEstadoConservacionOpcionesToEstadoConservacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estado_conservacion', function (Blueprint $table) {
            $table->integer('id_estado_conservacion_opciones')->nullable()->unsigned()->after('valor_ubicacion');

            $table->foreign('id_estado_conservacion_opciones')->references('id_estado_conservacion_opciones')->on('estado_conservacion_opciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estado_conservacion', function (Blueprint $table) {
            $table->dropColumn('id_estado_conservacion_opciones');
        });
    }
}
