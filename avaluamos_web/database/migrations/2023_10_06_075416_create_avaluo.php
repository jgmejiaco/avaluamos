<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaluo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaluo', function (Blueprint $table) {
            $table->bigIncrements('id_avaluo');
            $table->unsignedInteger('id_visita')->nullable();
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('avaluo');
    }
}
