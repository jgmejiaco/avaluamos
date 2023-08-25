<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReferidoPorToClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->integer('id_red_social')->nullable()->unsigned()->after('id_referido_por');
            $table->string('nombre_quien_refiere')->nullable()->after('id_red_social');
            $table->string('empresa_que_refiere')->nullable()->after('nombre_quien_refiere');

            $table->foreign('id_red_social')->references('id_red_social')->on('redes_sociales');
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
            $table->dropColumn('id_red_social');
            $table->dropColumn('nombre_quien_refiere');
            $table->dropColumn('empresa_que_refiere');
        });
    }
}
