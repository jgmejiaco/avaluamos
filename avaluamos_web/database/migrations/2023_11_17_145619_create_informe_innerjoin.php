<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformeInnerjoin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informe_innerjoin', function (Blueprint $table) {
            $table->increments('id_innerjoin');
            $table->integer('inf_codigo')->nullable();
            $table->text('infxcampo_codigo')->nullable();
            $table->text('inner_join')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informe_innerjoin');
    }
}
