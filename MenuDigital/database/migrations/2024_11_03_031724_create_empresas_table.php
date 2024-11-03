<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->integer('id_empresa')->primary();
            $table->string('telefone', 11)->notNullable();
            $table->string('cnpj', 15)->notNullable()->unique();
            $table->string('nome', 255)->notNullable();
            $table->string('email', 255)->notNullable()->unique();
            $table->string('endereco', 255)->notNullable();
            $table->string('senha', 255)->notNullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('empresas');
    }
};
