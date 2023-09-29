<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferidoPor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referido_por', function (Blueprint $table) {
            $table->increments('id_referido_por');
            $table->string('referido_por')->nullable();
            $table->integer('id_red_social')->nullable()->unsigned();
            $table->string('nombre_quien_refiere')->nullable();
            $table->string('empresa_que_refiere')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_red_social')->references('id_red_social')->on('redes_sociales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referido_por');
    }
}
