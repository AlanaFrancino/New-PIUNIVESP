<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->unsignedBigInteger('genero_id');
            $table->string('autor');
            $table->string('quantidade');
            $table->string('patrimonio');
            $table->string('doacao');
            $table->unsignedBigInteger('prateleira');
            $table->string('prat_local');
            $table->boolean('ativo')->default(true);
            $table->timestamps();
            $table->foreign('genero_id')->references('id')->on('generos');
            $table->foreign('prateleira')->references('id')->on('prateleiras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livros');
    }
}
