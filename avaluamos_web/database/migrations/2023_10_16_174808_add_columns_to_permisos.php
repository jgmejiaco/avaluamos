<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPermisos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permisos', function (Blueprint $table) {
            $table->boolean('mod_usuario')->nullable()->default(false)->after('id_permiso');
            $table->boolean('mod_clientes')->nullable()->default(false)->after('mod_usuario');
            $table->boolean('mod_calendario')->nullable()->default(false)->after('mod_clientes');
            $table->boolean('mod_avaluo')->nullable()->default(false)->after('mod_calendario');
            $table->boolean('mod_informes')->nullable()->default(null)->after('mod_avaluo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permisos', function (Blueprint $table) {
            $table->dropColumn('mod_usuario');
            $table->dropColumn('mod_clientes');
            $table->dropColumn('mod_calendario');
            $table->dropColumn('mod_avaluo');
            $table->dropColumn('mod_informes');
        });
    }
}
