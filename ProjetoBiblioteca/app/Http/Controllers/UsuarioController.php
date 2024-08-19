<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function create()
    {
        $this->authorize('create', Usuario::class);
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Usuario::class);

        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:usuarios',
            'role' => 'required|in:usuario,bibliotecario',
        ]);

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
