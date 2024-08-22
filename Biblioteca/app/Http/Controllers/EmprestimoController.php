<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprestimo;
use App\Models\Livro;
use Illuminate\Support\Facades\Auth;

class EmprestimoController extends Controller
{
    public function emprestimo($livroId)
    {
        $livro = Livro::findOrFail($livroId);
    
        if (!$livro->disponibilidade) {
            return redirect()->back()->with('error', 'Este livro está indisponível.');
        }
    
        $emprestimo = new Emprestimo();
        $emprestimo->user_id = Auth::id();
        $emprestimo->livro_id = $livro->id;
        $emprestimo->data_emprestimo = now();
        $emprestimo->data_devolucao = null; // Ajuste conforme necessário
        $emprestimo->save();
    
        // Atualiza a disponibilidade do livro
        $livro->disponibilidade = false;
        $livro->save();
    
        return redirect()->route('catalogo-livros')->with('success', 'Livro alugado com sucesso!');
    }
    
    
    public function confirmar($livroId)
{
    $livro = Livro::findOrFail($livroId);

    if (!$livro->disponibilidade) {
        return redirect()->route('catalogo-livros')->with('error', 'Este livro está indisponível.');
    }

    $emprestimo = new Emprestimo();
    $emprestimo->user_id = Auth::id();
    $emprestimo->livro_id = $livro->id;
    $emprestimo->data_emprestimo = now();
    $emprestimo->data_devolucao = null; // Ajustar conforme necessidade
    $emprestimo->save();

    // Atualiza a disponibilidade do livro
    $livro->disponibilidade = false;
    $livro->save();

    return redirect()->route('catalogo-livros')->with('success', 'Empréstimo realizado com sucesso!');
}


}