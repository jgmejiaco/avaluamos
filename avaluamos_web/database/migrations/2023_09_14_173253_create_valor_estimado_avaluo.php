<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValorEstimadoAvaluo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valor_estimado_avaluo', function (Blueprint $table) {
            $table->increments('id_valor_estimado_avaluo');
            $table->integer('id_visita')->nullable()->unsigned();
            $table->string('valor_estimado_inmueble')->nullable();
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
        Schema::dropIfExists('valor_estimado_avaluo');
    }
}
