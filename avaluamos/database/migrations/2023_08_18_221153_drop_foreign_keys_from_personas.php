<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropForeignKeysFromPersonas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personas', function (Blueprint $table) {
            $table->dropForeign(['id_lugar_nacimiento']);
            $table->dropForeign(['id_ciudad']);
            $table->dropForeign(['id_tipo_documento']);
            $table->dropForeign(['id_estado']);
            $table->dropForeign(['id_cargo']);
            $table->dropForeign(['id_rol']);
            $table->dropForeign(['id_usuario']);
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
            //
        });
    }
}
