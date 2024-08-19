<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;

    protected $table = 'emprestimos';

    protected $fillable = [
        'usuario_id',
        'livro_id',
        'data_emprestimo',
        'data_devolucao',
        'status',
    ];

    protected $casts = [
        'data_emprestimo' => 'datetime',
        'data_devolucao' => 'datetime',
        'status' => 'string',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }
}
