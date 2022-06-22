<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrateleirasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prateleiras', function (Blueprint $table) {
            $table->id();
            $table->string('rua');
            $table->string('altura');
            $table->string('largura');
            $table->string('descricao');
            $table->unsignedBigInteger('user_cadastro');
            $table->boolean('ativo')->default(true);
            $table->timestamps();
            $table->foreign('user_cadastro')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parteleiras');
    }
}
