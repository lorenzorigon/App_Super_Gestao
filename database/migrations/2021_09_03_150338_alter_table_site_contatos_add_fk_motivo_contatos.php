<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_contatos', function(Blueprint $table){
            //adicionando a columa motivo_contatos_id
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        //atribuindo a coluna motivo_contatos para a nova coluna motivo-contatos_id
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        //criando a fk e remover coluna motivo contato
        Schema::table('site_contatos', function(Blueprint $table){
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //criar a coluna motivo contato e removendo a fk da motivo_contatos_id
        Schema::table('site_contatos', function(Blueprint $table){
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });

        //atribuindo a coluna motivo_contatos_id para a nova coluna motivo-contatos
        DB::statement('update site_contatos set motivo_contato = motivo_contatos_id');

        Schema::table('site_contatos', function(Blueprint $table){
            //removendo a columa motivo_contatos_id
            $table->dropColumn('motivo_contatos_id');
        });
    }
}
