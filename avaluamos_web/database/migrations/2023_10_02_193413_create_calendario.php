<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendario', function (Blueprint $table) {
            $table->bigIncrements('id_visita_calendario');
            $table->integer('fecha_visita_calendario')->nullable();
            $table->string('nombre_cliente')->nullable();
            $table->string('celular')->nullable();
            $table->unsignedInteger('tipo_inmueble')->nullable();
            $table->unsignedInteger('munipio')->nullable();
            $table->string('barrio')->nullable();
            $table->string('direccion')->nullable();
            $table->boolean('visita_cumplida')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('tipo_inmueble')->references('id_tipo_inmueble')->on('tipo_inmueble')->onDelete('cascade');
            $table->foreign('munipio')->references('id_ciudad')->on('ciudad')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calendario');
    }
}
