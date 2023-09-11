<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitas', function (Blueprint $table) {
            $table->increments('id_visita');
            $table->integer('id_cliente')->nullable()->unsigned(); // relación con tbl_dirigo_a (empresas)
            $table->integer('id_dirigido_a')->nullable()->unsigned(); // relación con tbl_dirigo_a (empresas)
            $table->integer('id_doc_empresa')->nullable()->unsigned(); // relación con tipo_documento
            $table->string('documento_empresa')->nullable();
            $table->string('objeto_avaluo')->nullable(); // es un array por ser varios checkbox
            $table->integer('id_pais')->nullable()->unsigned(); // relación con pais
            $table->integer('id_departamento')->nullable()->unsigned(); // relación con departamento
            $table->integer('id_ciudad')->nullable()->unsigned(); // relación con ciudad
            $table->string('sector')->nullable();
            $table->string('cerca_de')->nullable();
            $table->string('barrio')->nullable();
            $table->string('unidad_edificio')->nullable();
            $table->string('direccion')->nullable();
            $table->integer('id_tipo_inmueble')->nullable()->unsigned(); // relación con tipo inmueble
            $table->string('area')->nullable();
            $table->integer('id_estrato')->nullable()->unsigned();
            $table->string('numero_inmueble')->nullable();
            $table->integer('id_cant_parqueaderos')->nullable()->unsigned(); // relación con id_indicador_numerico
            $table->integer('id_cant_cuarto_util')->nullable()->unsigned(); // relación con id_indicador_numerico
            $table->integer('id_cant_kioskos')->nullable()->unsigned(); // relación con id_indicador_numerico
            $table->integer('id_cant_piscinas')->nullable()->unsigned(); // relación con id_indicador_numerico
            $table->integer('id_cant_establos')->nullable()->unsigned(); // relación con id_indicador_numerico
            $table->integer('id_cant_billares')->nullable()->unsigned(); // relación con id_indicador_numerico
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->string('porcentaje_descuento')->nullable();
            $table->string('valor_cotizacion')->nullable();
            $table->text('obser_visita')->nullable();
            $table->integer('id_visitado')->nullable()->unsigned(); // relación con id_si_no
            $table->string('fecha_visita')->nullable();
            $table->string('hora_visita')->nullable();
            $table->integer('id_visitador')->nullable()->unsigned(); // relación con usuarios
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_cliente')->references('id_cliente')->on('clientes');
            $table->foreign('id_dirigido_a')->references('id_dirigido_a')->on('dirigido_a');
            $table->foreign('id_doc_empresa')->references('id_tipo_documento')->on('tipo_documento');
            $table->foreign('id_pais')->references('id_pais')->on('pais');
            $table->foreign('id_departamento')->references('id_departamento_estado')->on('departamento_estado');
            $table->foreign('id_ciudad')->references('id_ciudad')->on('ciudad');
            $table->foreign('id_tipo_inmueble')->references('id_tipo_inmueble')->on('tipo_inmueble');
            $table->foreign('id_estrato')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('id_cant_parqueaderos')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('id_cant_cuarto_util')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('id_cant_kioskos')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('id_cant_piscinas')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('id_cant_establos')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('id_cant_billares')->references('id_indicador_numerico')->on('indicador_numerico');
            $table->foreign('id_visitado')->references('id_si_no')->on('si_no');
            $table->foreign('id_visitador')->references('id_usuario')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitas');
    }
}
