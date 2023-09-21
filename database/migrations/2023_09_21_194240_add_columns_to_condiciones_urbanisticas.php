<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCondicionesUrbanisticas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('condiciones_urbanisticas', function (Blueprint $table) {
            $table->integer('cu_aceras')->nullable()->unsigned()->after('id_tipo_vias');
            $table->integer('cu_red_gas')->nullable()->unsigned()->after('cu_aceras');
            $table->integer('cu_red_telco')->nullable()->unsigned()->after('cu_red_gas');
            $table->integer('cu_red_acueducto')->nullable()->unsigned()->after('cu_red_telco');
            $table->integer('cu_red_alcantarillado')->nullable()->unsigned()->after('cu_red_acueducto');

            $table->foreign('cu_aceras')->references('id_si_no')->on('si_no');
            $table->foreign('cu_red_gas')->references('id_si_no')->on('si_no');
            $table->foreign('cu_red_telco')->references('id_si_no')->on('si_no');
            $table->foreign('cu_red_acueducto')->references('id_si_no')->on('si_no');
            $table->foreign('cu_red_alcantarillado')->references('id_si_no')->on('si_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('condiciones_urbanisticas', function (Blueprint $table) {
            $table->dropColumn('cu_aceras');
            $table->dropColumn('cu_red_gas');
            $table->dropColumn('cu_red_telco');
            $table->dropColumn('cu_red_acueducto');
            $table->dropColumn('cu_red_alcantarillado');
        });
    }
}
