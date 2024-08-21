<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBibliotecarioIdToLivrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('livros', function (Blueprint $table) {
            $table->unsignedBigInteger('bibliotecario_id')->nullable();
            $table->foreign('bibliotecario_id')->references('id')->on('users')->onDelete('set null');
        });
    }
    
    public function down()
    {
        Schema::table('livros', function (Blueprint $table) {
            $table->dropForeign(['bibliotecario_id']);
            $table->dropColumn('bibliotecario_id');
        });
    }
    
}
