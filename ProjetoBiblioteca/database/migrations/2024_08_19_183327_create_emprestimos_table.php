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
    Schema::create('emprestimos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('usuario_id')->constrained()->onDelete('cascade');
        $table->foreignId('livro_id')->constrained()->onDelete('cascade');
        $table->timestamp('data_emprestimo');
        $table->timestamp('data_devolucao')->nullable();
        $table->string('status')->default('emprestado');
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprestimos');
    }
};
