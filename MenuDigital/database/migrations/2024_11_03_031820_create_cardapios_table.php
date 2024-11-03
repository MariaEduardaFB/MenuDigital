<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardapiosTable extends Migration
{
    public function up()
    {
        Schema::create('cardapios', function (Blueprint $table) {
            $table->integer('id_cardapio')->primary();
            $table->string('descricao', 500)->notNullable();
            $table->string('link_imagem', 500)->notNullable();
            $table->integer('fk_empresa_id_empresa')->notNullable();
            $table->foreign('fk_empresa_id_empresa')->references('id_empresa')->on('empresas')->onDelete('restrict');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cardapios');
    }
};
