<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pais', function (Blueprint $table) {
            $table->increments('id_pais');
            $table->string('descripcion_pais')->nullable();
            $table->integer('id_estado')->nullable()->unsigned();
            $table->integer('id_departamento_estado')->nullable()->unsigned();
            $table->timestamps();
            $table->softdeletes();

            $table->foreign('id_estado')->references('id_estado')->on('estado');
            $table->foreign('id_departamento_estado')->references('id_departamento_estado')->on('departamento_estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pais');
    }
}
