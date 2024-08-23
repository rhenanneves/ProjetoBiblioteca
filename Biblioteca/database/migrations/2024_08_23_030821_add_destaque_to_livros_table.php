<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDestaqueToLivrosTable extends Migration
{
    /**
     * Execute the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('livros', function (Blueprint $table) {
            $table->boolean('destaque')->default(false)->after('imagem_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('livros', function (Blueprint $table) {
            $table->dropColumn('destaque');
        });
    }
}
