<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargo', function (Blueprint $table) {
            $table->increments('id_cargo');
            $table->string('descripcion_cargo')->nullable();
            $table->integer('id_estado')->nullable()->unsigned();
            $table->timestamps();
            $table->softdeletes();

            $table->foreign('id_estado')->references('id_estado')->on('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargo');
    }
}
