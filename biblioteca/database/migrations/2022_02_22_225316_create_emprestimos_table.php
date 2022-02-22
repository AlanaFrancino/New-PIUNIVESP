<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmprestimosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('livro_id');
            $table->unsignedBigInteger('aluno_id');
            $table->unsignedBigInteger('funcionario_id');
            $table->timestamps('dt_prevdev');
            $table->timestamps('dt_dev');
            $table->integer('qnt');
            $table->unsignedBigInteger('user_cadastro');
            $table->string('status');
            $table->timestamps();
            $table->foreign('livro_id')->references('id')->on('livros');
            $table->foreign('aluno_id')->references('id')->on('alunos');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emprestimos');
    }
}
