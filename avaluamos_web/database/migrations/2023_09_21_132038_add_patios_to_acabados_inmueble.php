<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPatiosToAcabadosInmueble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('acabados_inmueble', function (Blueprint $table) {
            $table->integer('patios')->nullable()->unsigned()->after('gas');

            $table->foreign('patios')->references('id_tipo_piso')->on('tipo_pisos');
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
            $table->dropColumn('patios');
        });
    }
}
