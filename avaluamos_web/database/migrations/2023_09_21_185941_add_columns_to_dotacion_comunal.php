<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToDotacionComunal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dotacion_comunal', function (Blueprint $table) {
            $table->integer('gimnasio')->nullable()->unsigned()->after('canchas');
            $table->integer('playground')->nullable()->unsigned()->after('gimnasio');
            $table->integer('barbecue')->nullable()->unsigned()->after('playground');
            $table->integer('supermercado')->nullable()->unsigned()->after('barbecue');
            $table->integer('sala_cine')->nullable()->unsigned()->after('supermercado');
            $table->integer('cafeteria')->nullable()->unsigned()->after('sala_cine');
            $table->integer('restaurante')->nullable()->unsigned()->after('cafeteria');
            $table->integer('squash')->nullable()->unsigned()->after('restaurante');

            $table->foreign('gimnasio')->references('id_si_no')->on('si_no');
            $table->foreign('playground')->references('id_si_no')->on('si_no');
            $table->foreign('barbecue')->references('id_si_no')->on('si_no');
            $table->foreign('supermercado')->references('id_si_no')->on('si_no');
            $table->foreign('sala_cine')->references('id_si_no')->on('si_no');
            $table->foreign('cafeteria')->references('id_si_no')->on('si_no');
            $table->foreign('restaurante')->references('id_si_no')->on('si_no');
            $table->foreign('squash')->references('id_si_no')->on('si_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dotacion_comunal', function (Blueprint $table) {
           $table->dropColumn('gimnasio');
           $table->dropColumn('playground');
           $table->dropColumn('barbecue');
           $table->dropColumn('supermercado');
           $table->dropColumn('sala_cine');
           $table->dropColumn('cafeteria');
           $table->dropColumn('restaurante');
           $table->dropColumn('squash');
        });
    }
}
