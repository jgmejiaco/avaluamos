<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcabadosInmueble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acabados_inmueble', function (Blueprint $table) {
            $table->increments('id_acabados_inmueble');
            $table->integer('id_visita')->nullable()->unsigned();
            $table->integer('id_sistema_constructivo')->nullable()->unsigned();
            $table->integer('porton_principal')->nullable()->unsigned();
            $table->integer('id_tipo_fachada')->nullable()->unsigned();
            $table->integer('puertas')->nullable()->unsigned();
            $table->integer('id_tipo_muro')->nullable()->unsigned();
            $table->integer('id_ventaneria')->nullable()->unsigned();
            $table->integer('id_tipo_techo')->nullable()->unsigned();
            $table->string('servicios_publicios')->nullable();
            $table->string('pisos')->nullable();
            $table->string('telefono')->nullable();
            $table->string('banios')->nullable();
            $table->string('energia')->nullable();
            $table->string('cocina')->nullable();
            $table->string('agua')->nullable();
            $table->string('meson')->nullable();
            $table->string('gas')->nullable();
            $table->text('obs_acabados_inmueble')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_visita')->references('id_visita')->on('visitas');
            $table->foreign('id_sistema_constructivo')->references('id_sistema_constructivo')->on('sistema_constructivo');
            $table->foreign('porton_principal')->references('id_puertas_material')->on('puertas_material');
            $table->foreign('id_tipo_fachada')->references('id_tipo_fachada')->on('tipo_fachada');
            $table->foreign('puertas')->references('id_puertas_material')->on('puertas_material');
            $table->foreign('id_tipo_muro')->references('id_tipo_muro')->on('tipo_muro');
            $table->foreign('id_ventaneria')->references('id_ventaneria')->on('ventaneria');
            $table->foreign('id_tipo_techo')->references('id_tipo_techo')->on('tipo_techo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acabados_inmueble');
    }
}
