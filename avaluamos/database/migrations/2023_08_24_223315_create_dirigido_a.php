<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirigidoA extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dirigido_a', function (Blueprint $table) {
            $table->increments('id_dirigido_a');
            $table->string('dirigido_a')->nullable();
            $table->integer('id_tipo_documento')->nullable()->unsigned();
            $table->string('numero_documento')->nullable();
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('dirigido_a');
    }
}
