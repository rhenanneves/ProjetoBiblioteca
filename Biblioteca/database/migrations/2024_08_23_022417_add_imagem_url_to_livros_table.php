<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagemUrlToLivrosTable extends Migration
{
    public function up()
    {
        Schema::table('livros', function (Blueprint $table) {
            $table->string('imagem_url')->nullable();
        });
    }

    public function down()
    {
        Schema::table('livros', function (Blueprint $table) {
            $table->dropColumn('imagem_url');
        });
    }
}

