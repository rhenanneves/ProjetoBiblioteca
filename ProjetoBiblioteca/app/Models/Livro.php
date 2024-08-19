<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $table = 'livros';

    protected $fillable = [
        'titulo',
        'autor',
        'genero',
        'disponivel',
    ];

    protected $casts = [
        'disponivel' => 'boolean',
    ];

    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class);
    }
}
