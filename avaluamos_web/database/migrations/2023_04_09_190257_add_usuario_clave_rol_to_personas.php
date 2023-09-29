<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsuarioClaveRolToPersonas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personas', function (Blueprint $table) {
            $table->string('nombre_usuario')->nullable()->after('id_usuario');
            $table->string('clave')->nullable()->after('nombre_usuario');
            $table->string('clave_fallas')->nullable()->after('clave');
            $table->integer('id_rol')->unsigned()->nullable()->after('id_cargo');

            $table->foreign('id_rol')->references('id_rol')->on('rol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personas', function (Blueprint $table) {
            $table->dropColumn('nombre_usuario');
            $table->dropColumn('clave');
            $table->dropColumn('clave_fallas');
            $table->dropColumn('id_rol');
        });
    }
}
