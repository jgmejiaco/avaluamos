<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsTypeToAcabadosInmueble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('acabados_inmueble', function (Blueprint $table) {
            $table->integer('servicios_publicios')->nullable()->unsigned()->change();
            $table->integer('pisos')->nullable()->unsigned()->change();
            $table->integer('telefono')->nullable()->unsigned()->change();
            $table->integer('banios')->nullable()->unsigned()->change();
            $table->integer('energia')->nullable()->unsigned()->change();
            $table->integer('cocina')->nullable()->unsigned()->change();
            $table->integer('agua')->nullable()->unsigned()->change();
            $table->integer('meson')->nullable()->unsigned()->change();
            $table->integer('gas')->nullable()->unsigned()->change();
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
