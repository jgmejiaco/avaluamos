<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoDocumento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->integer('id_doc_cliente')->nullable()->unsigned()->after('cli_nombres');
            $table->string('documento_cliente')->nullable()->after('id_doc_cliente');
            $table->integer('id_doc_empresa')->nullable()->unsigned()->after('id_dirigido_a');
            $table->string('documento_empresa')->nullable()->after('id_doc_empresa');

            $table->foreign('id_doc_cliente')->references('id_tipo_documento')->on('tipo_documento');
            $table->foreign('id_doc_empresa')->references('id_tipo_documento')->on('tipo_documento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropColumn('id_doc_cliente');
            $table->dropColumn('documento_cliente');
            $table->dropColumn('id_doc_empresa');
            $table->dropColumn('documento_empresa');
        });
    }
}
