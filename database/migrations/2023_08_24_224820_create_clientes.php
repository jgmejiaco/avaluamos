<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id_cliente');
            $table->string('cli_nombres')->nullable();
            $table->string('cli_celular')->nullable();
            $table->string('cli_email')->nullable();
            $table->integer('id_tipo_persona')->nullable()->unsigned(); // persona natural o jurídica
            $table->string('dirigido_a')->nullable(); // dirigido a (hacer insert en empresas)
            $table->integer('id_tipo_documento')->nullable()->unsigned(); // tipo documento dirigido a:
            $table->string('doc_dirigido_a')->nullable(); // nombre dirigido a
            $table->string('objeto_avaluo')->nullable(); // es un array por ser varios checkbox
            $table->integer('id_ciudad')->nullable()->unsigned(); // relación con ciudad
            $table->string('barrio')->nullable();
            $table->string('direccion')->nullable();
            $table->integer('id_tipo_inmueble')->nullable()->unsigned(); // relación con tipo inmueble
            $table->string('area')->nullable();
            $table->integer('id_estrato')->nullable()->unsigned();
            $table->string('numero_inmueble')->nullable();
            $table->integer('cant_parqueaderos')->nullable()->unsigned(); // relación con id_indicador_numerico
            $table->integer('cant_cuarto_util')->nullable()->unsigned(); // relación con id_indicador_numerico
            $table->integer('cant_kioskos')->nullable()->unsigned(); // relación con id_indicador_numerico
            $table->integer('cant_piscinas')->nullable()->unsigned(); // relación con id_indicador_numerico
            $table->integer('cant_establos')->nullable()->unsigned(); // relación con id_indicador_numerico
            $table->integer('cant_billares')->nullable()->unsigned(); // relación con id_indicador_numerico
            $table->integer('id_referido_por')->nullable()->unsigned(); // relación con id_referido_por
            $table->string('porcentaje_descuento')->nullable();
            $table->string('valor_cotizacion')->nullable();
            $table->integer('id_visitado')->nullable()->unsigned();; // relación con id_si_no
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_tipo_persona')->references('id_tipo_persona')->on('tipo_persona');
            $table->foreign('id_tipo_documento')->references('id_tipo_documento')->on('tipo_documento');
            $table->foreign('id_ciudad')->references('id_ciudad')->on('ciudad');
            $table->foreign('id_tipo_inmueble')->references('id_tipo_inmueble')->on('tipo_inmueble');
            $table->foreign('id_estrato')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('cant_parqueaderos')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('cant_cuarto_util')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('cant_kioskos')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('cant_piscinas')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('cant_establos')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('cant_billares')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('id_referido_por')->references('id_referido_por')->on('referido_por');
            $table->foreign('id_visitado')->references('id_si_no')->on('si_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
