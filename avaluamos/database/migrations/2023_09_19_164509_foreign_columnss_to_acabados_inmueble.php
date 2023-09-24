<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignColumnssToAcabadosInmueble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('acabados_inmueble', function (Blueprint $table) {
            // $table->foreign('pisos')->references('id_tipo_piso')->on('tipo_pisos');
            $table->foreign('banios')->references('id_tipo_banio')->on('tipo_banios');
            $table->foreign('cocina')->references('id_tipo_cocina')->on('tipo_cocina');
            $table->foreign('meson')->references('id_tipo_meson')->on('tipo_meson');
            $table->foreign('servicios_publicos')->references('id_si_no')->on('si_no');
            $table->foreign('telefono')->references('id_si_no')->on('si_no');
            $table->foreign('energia')->references('id_si_no')->on('si_no');
            $table->foreign('agua')->references('id_si_no')->on('si_no');
            $table->foreign('gas')->references('id_si_no')->on('si_no');
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
