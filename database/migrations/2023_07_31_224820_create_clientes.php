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
            $table->string('cliente_nombres')->nullable();
            $table->string('cliente_celular')->nullable();
            $table->string('cliente_email')->nullable();
            $table->integer('id_tipo_persona')->nullable()->unsigned(); // persona natural o jurídica
            $table->integer('id_empresa')->nullable()->unsigned(); // dirigido a
            $table->integer('id_tipo_documento')->nullable()->unsigned(); // tipo documento
            $table->integer('objeto_avaluo')->nullable()->unsigned(); // es un array por ser varios checkbox
            $table->integer('id_ciudad')->nullable()->unsigned(); // relación con ciudad
            $table->string('barrio')->nullable();
            $table->string('direccion')->nullable();
            $table->integer('id_tipo_inmueble')->nullable()->unsigned(); // relación con tipo inmueble
            $table->string('area')->nullable();
            $table->string('estrato')->nullable();
            $table->string('numero_inmueble')->nullable();
            $table->integer('cant_parqueaderos')->nullable()->unsigned(); // relación con id_indicador_numerico
            $table->integer('cant_cuartos_utiles')->nullable()->unsigned(); // relación con id_indicador_numerico
            $table->integer('cant_kioskos')->nullable()->unsigned(); // relación con id_indicador_numerico
            $table->integer('cant_piscinas')->nullable()->unsigned(); // relación con id_indicador_numerico
            $table->integer('cant_establos')->nullable()->unsigned(); // relación con id_indicador_numerico
            $table->integer('cant_billares')->nullable()->unsigned(); // relación con id_indicador_numerico
            $table->integer('id_referido_por')->nullable()->unsigned(); // relación con id_referido_por
            $table->string('porcentaje_descuento')->nullable();
            $table->string('valor_cotizacion')->nullable();
            $table->string('visitado')->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
