<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoJuridica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_juridica', function (Blueprint $table) {
            $table->increments('id_info_juridica');
            $table->integer('id_visita')->nullable()->unsigned();
            $table->string('propietario1')->nullable();
            $table->string('doc_propietario1')->nullable();
            $table->string('propietario2')->nullable();
            $table->string('doc_propietario2')->nullable();
            $table->string('matricula_inmueble')->nullable();
            $table->string('coeficiente_copropiedad')->nullable();
            $table->string('certificado_libertad')->nullable();
            $table->string('escritura_publica')->nullable();
            $table->string('notaria')->nullable();
            $table->string('imp_predial_anual')->nullable();
            $table->string('administracion')->nullable();
            $table->string('avaluo_catastral')->nullable();
            $table->text('normas_usos')->nullable();
            $table->text('mejor_mayor_uso')->nullable();
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
        Schema::dropIfExists('info_juridica');
    }
}
