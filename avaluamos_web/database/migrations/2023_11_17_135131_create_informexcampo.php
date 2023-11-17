<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformexcampo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informexcampo', function (Blueprint $table) {
            $table->increments('infxcampo_codigo');
            $table->unsignedInteger('inf_codigo')->nullable();
            $table->string('cam_descripcion')->nullable();
            $table->text('cam_select_sql')->nullable();
            $table->text('cam_join_sql')->nullable();
            $table->text('cam_where_sql')->nullable();
            $table->boolean('cam_requerido')->nullable();
            $table->integer('cam_tipo')->nullable();
            $table->boolean('cam_agrupar')->nullable();
            $table->integer('cam_orden')->nullable();
            $table->text('cam_adicional')->nullable();
            $table->boolean('cam_filtro')->nullable();
            $table->integer('filtro_orden')->nullable();
            $table->unsignedInteger('filtro_tipo')->nullable();
            $table->text('filtro_atributos')->nullable();
            $table->text('filtro_value')->nullable();
            $table->text('filtro_sql')->nullable();
            $table->string('opt_value')->nullable();
            $table->string('opt_contenido')->nullable();
            $table->string('cam_filtro_where')->nullable();
            $table->text('cam_join_adicionales')->nullable();
            $table->text('cam_link')->nullable();
            $table->boolean('estado_cam')->nullable();
            $table->integer('infxsec_codigo')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('inf_codigo')->references('inf_codigo')->on('informe')->onDelete('cascade');
            $table->foreign('filtro_tipo')->references('infxfil_codigo')->on('informexfiltro')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informexcampo');
    }
}
