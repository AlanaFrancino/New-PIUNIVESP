<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableAddNullableInEmprestimosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emprestimos', function (Blueprint $table) {
            $table->foreign('livro_id')->references('id')->nullable()->on('livros');
            $table->foreign('aluno_id')->references('id')->nullable()->on('alunos');
            $table->dateTime('dt_dev')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emprestimos', function (Blueprint $table) {
            $table->foreign('livro_id')->references('id')->on('livros');
            $table->foreign('aluno_id')->references('id')->on('alunos');
            $table->dateTime('dt_dev');
        });
    }
}
