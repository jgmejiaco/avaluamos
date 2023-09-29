<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->string('nombres')->nullable()->after('clave');
            $table->string('apellidos')->nullable()->after('nombres');
            $table->integer('id_tipo_documento')->nullable()->unsigned()->after('apellidos');
            $table->string('numero_documento')->nullable()->after('id_tipo_documento');
            $table->integer('id_cargo')->nullable()->unsigned()->after('id_rol');
            $table->string('correo')->nullable()->after('id_cargo');
            $table->string('celular')->nullable()->after('correo');

            $table->foreign('id_cargo')->references('id_cargo')->on('cargo');
            $table->foreign('id_tipo_documento')->references('id_tipo_documento')->on('tipo_documento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropColumn('nombres');
            $table->dropColumn('apellidos');
            $table->dropColumn('id_tipo_documento');
            $table->dropColumn('numero_documento');
            $table->dropColumn('id_cargo');
            $table->dropColumn('correo');
            $table->dropColumn('celular');
        });
    }
}
