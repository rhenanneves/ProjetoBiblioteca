<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Emprestimo; // Ajuste o nome conforme necessário
use App\Models\Livro;
use Illuminate\Container\Attributes\Database;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
{
    $user = Auth::user();

    if ($user->is_bibliotecario) {
        return redirect()->route('bibliotecario-admin');
    } else {
        $loans = Emprestimo::where('user_id', $user->id)->with('livro')->get();
        return view('dashboard.usuario', compact('user', 'loans'));
    }
}

    public function dashboard()
    {
        $user_id = Auth::id();
        $loans = Emprestimo::with('livro')->get();
    
        // Passa os dados para a view
        return view('dashboard.usuario', compact('user_id', 'loans'));
    }
    





    public function bibliotecario()
    {
        $users = User::all(); // Obtém todos os usuários
        $loans = Emprestimo::with('livro')->get(); // Obtém todos os empréstimos com os livros relacionados

        return view('dashboard.bibliotecario', compact('users', 'loans'));
    }
    public function bibliotecarioAdmin()
    {
        // Obtém todos os usuários e empréstimos
        $users = User::all();
        $loans = Emprestimo::with('livro')->get();

        // Retorna a view com as variáveis
        return view('dashboard.bibliotecario-admin', compact('users', 'loans'));
    }


    public function livroDetalhes($id)
    {
        $livro = Livro::find($id);

        if (!$livro) {
            abort(404, 'Livro não encontrado.');
        }

        return view('livro-detalhes', ['livro' => $livro]);
    }

    public function catalogoLivros()
    {
        $livros = Livro::all(); // Isso retorna todos os livros
        return view('livros.catalogo-livros', compact('livros'));
    }
}
