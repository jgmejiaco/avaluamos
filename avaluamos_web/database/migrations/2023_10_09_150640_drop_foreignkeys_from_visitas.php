<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropForeignkeysFromVisitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visitas', function (Blueprint $table) {
            $table->dropForeign(['id_cant_parqueaderos']);
            $table->dropForeign(['id_cant_cuarto_util']);
            $table->dropForeign(['id_cant_kioskos']);
            $table->dropForeign(['id_cant_piscinas']);
            $table->dropForeign(['id_cant_establos']);
            $table->dropForeign(['id_cant_billares']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visitas', function (Blueprint $table) {
            //
        });
    }
}
