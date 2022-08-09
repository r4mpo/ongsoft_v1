<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name'); // Nome do Pet
            $table->unsignedBigInteger('age'); // Idade do Pet

           // Criado para armazenar diversos dados (json)
           // Pensado como uma forma de armazenar os checkbox
            $table->json('details');

            // Chave Estrangeira
            // Usuário responsável pelo cadastro
            $table->unsignedBigInteger('fk_user');
            $table->foreign('fk_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
};
