<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItensCardapioTable extends Migration
{
    public function up()
    {
        Schema::create('itens_cardapio', function (Blueprint $table) {
            $table->integer('id_item_cardapio')->primary();
            $table->string('nome_produto', 500)->notNullable();
            $table->string('descricao', 500)->notNullable();
            $table->decimal('preco', 10, 2)->notNullable();
            $table->string('link_imagem_itens', 500)->notNullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('itens_cardapio');
    }
};
