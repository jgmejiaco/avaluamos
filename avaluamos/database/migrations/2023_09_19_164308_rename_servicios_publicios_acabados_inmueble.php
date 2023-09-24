<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameServiciosPubliciosAcabadosInmueble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('acabados_inmueble', function (Blueprint $table) {
            $table->renameColumn('servicios_publicios', 'servicios_publicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('acabados_inmueble', function (Blueprint $table) {
            //
        });
    }
}
