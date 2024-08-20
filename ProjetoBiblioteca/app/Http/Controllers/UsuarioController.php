<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lógica para listar usuários
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Verificação manual de permissão
        if (Auth::user()->role !== 'bibliotecario') {
            abort(403, 'Você não tem permissão para criar um usuário.');
        }

        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Verificação manual de permissão
        if (Auth::user()->role !== 'bibliotecario') {
            abort(403, 'Você não tem permissão para criar um usuário.');
        }

        // Validação dos dados
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:usuarios',
            'role' => 'required|in:usuario,bibliotecario',
        ]);

        // Criação do usuário
        Usuario::create($request->all());

        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Lógica para mostrar um usuário específico
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Lógica para mostrar o formulário de edição
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Lógica para atualizar um usuário
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Lógica para excluir um usuário
    }
}
