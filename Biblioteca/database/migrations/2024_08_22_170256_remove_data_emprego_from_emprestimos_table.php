<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('emprestimos', function (Blueprint $table) {
            $table->dropColumn('data_emprego');
        });
    }
    
    public function down()
    {
        Schema::table('emprestimos', function (Blueprint $table) {
            $table->timestamp('data_emprego')->nullable(); // Adiciona a coluna de volta se necessário
        });
    }
    
};
