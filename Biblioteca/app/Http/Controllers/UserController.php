<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Exibe o formulário de cadastro
    public function create()
    {
        return view('auth.register');
    }

    // Processa o cadastro do usuário
    public function store(Request $request)
    {
        // Validação dos dados
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'is_bibliotecario' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Criação do usuário
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_bibliotecario' => $request->is_bibliotecario ? true : false,
        ]);

        return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso!');
    }
    public function index()
    {
        // Recupera todos os usuários
        $usuarios = User::all();

        // Retorna a view com a lista de usuários
        return view('usuarios.index', compact('usuarios'));
    }
}
