<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'autor',
        'genero',
        'disponibilidade',
        'bibliotecario_id', // Adiciona a nova coluna
    ];

    // Defina a relação se necessário
    public function bibliotecario()
    {
        return $this->belongsTo(User::class, 'bibliotecario_id');
    }
    
}
