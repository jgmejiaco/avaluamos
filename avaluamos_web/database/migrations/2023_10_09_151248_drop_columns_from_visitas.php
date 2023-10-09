<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnsFromVisitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visitas', function (Blueprint $table) {
            $table->dropColumn(['id_cant_parqueaderos']);
            $table->dropColumn(['id_cant_cuarto_util']);
            $table->dropColumn(['id_cant_kioskos']);
            $table->dropColumn(['id_cant_piscinas']);
            $table->dropColumn(['id_cant_establos']);
            $table->dropColumn(['id_cant_billares']);
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
