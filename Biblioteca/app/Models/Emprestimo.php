<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'livro_id',
        'data_emprego',
        'data_devolucao',
    ];

    public function livro()
    {
        return $this->belongsTo(Livro::class, 'livro_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
