<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id_persona');
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->integer('fecha_nacimiento')->nullable()->unsigned();
            $table->string('lugar_nacimiento')->nullable();
            $table->integer('id_tipo_documento')->nullable()->unsigned();
            $table->string('numero_documento')->nullable();
            $table->string('correo')->nullable();
            $table->string('direccion')->nullable();
            $table->string('celular')->nullable();
            $table->string('telefono_fijo')->nullable();
            $table->string('nombre_contacto')->nullable();
            $table->string('telefono_contacto')->nullable();
            $table->integer('id_ciudad')->nullable()->unsigned();
            $table->integer('id_estado')->nullable()->unsigned();
            $table->integer('id_cargo')->nullable()->unsigned();
            $table->integer('id_usuario')->nullable()->unsigned();
            $table->timestamps();
            $table->softdeletes();

            $table->foreign('id_estado')->references('id_estado')->on('estado');
            $table->foreign('id_cargo')->references('id_cargo')->on('cargo');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
            $table->foreign('id_tipo_documento')->references('id_tipo_documento')->on('tipo_documento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
