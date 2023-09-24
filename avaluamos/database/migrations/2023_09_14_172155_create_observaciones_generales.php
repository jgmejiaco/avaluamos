<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObservacionesGenerales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observaciones_generales', function (Blueprint $table) {
            $table->increments('id_obs_generales');
            $table->integer('id_visita')->nullable()->unsigned();
            $table->text('observaciones_generales')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_visita')->references('id_visita')->on('visitas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('observaciones_generales');
    }
}
