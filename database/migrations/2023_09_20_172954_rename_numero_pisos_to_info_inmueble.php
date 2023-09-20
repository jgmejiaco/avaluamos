<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameNumeroPisosToInfoInmueble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info_inmueble', function (Blueprint $table) {
            $table->renameColumn('numero_pisos', 'pisos_inmueble');
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
            //
        });
    }
}
