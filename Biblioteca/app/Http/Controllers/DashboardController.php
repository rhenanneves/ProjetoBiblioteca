<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Emprestimo; // Ajuste o nome conforme necessário
use App\Models\Livro;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->is_bibliotecario) {
            return view('dashboard.bibliotecario');
        } else {
            return view('dashboard.usuario'); // Certifique-se de que o nome da view está correto
        }
    }


    // Método para mostrar o dashboard do bibliotecário
    public function bibliotecario()
    {
        $users = User::all(); // Obtém todos os usuários
        $loans = Emprestimo::with('livro')->get(); // Obtém todos os empréstimos com os livros relacionados

        return view('dashboard.bibliotecario', compact('users', 'loans'));
    }

  
}
