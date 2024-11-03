<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertenceTable extends Migration
{
    public function up()
    {
        Schema::create('pertence', function (Blueprint $table) {
            $table->integer('fk_cardapio_id_cardapio')->notNullable();
            $table->integer('fk_itens_cardapio_id_item_cardapio')->notNullable();

            $table->foreign('fk_cardapio_id_cardapio')->references('id_cardapio')->on('cardapios')->onDelete('restrict');
            $table->foreign('fk_itens_cardapio_id_item_cardapio')->references('id_item_cardapio')->on('itens_cardapio')->onDelete('restrict');
            
            $table->primary(['fk_cardapio_id_cardapio', 'fk_itens_cardapio_id_item_cardapio']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pertence');
    }
};
