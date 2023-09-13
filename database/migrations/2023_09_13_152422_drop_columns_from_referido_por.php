<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnsFromReferidoPor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('referido_por', function (Blueprint $table) {
            $table->dropColumn('id_red_social');
            $table->dropColumn('nombre_quien_refiere');
            $table->dropColumn('empresa_que_refiere');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('referido_por', function (Blueprint $table) {
            //
        });
    }
}
