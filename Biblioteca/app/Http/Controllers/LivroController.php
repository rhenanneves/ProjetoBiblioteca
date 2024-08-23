<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::all();
        return view('livros.index', compact('livros'));
        
    }

    public function create()
    {
        return view('livros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string',
            'autor' => 'required|string',
            'genero' => 'required|string',
            'disponibilidade' => 'required|boolean',
            'imagem_url' => 'nullable|string|max:255'
        ]);
    
        Livro::create([
            'titulo' => $request->input('titulo'),
            'autor' => $request->input('autor'),
            'genero' => $request->input('genero'),
            'disponibilidade' => $request->input('disponibilidade'),
            'imagem_url' => $request->input('imagem_url'), // Adicionando imagem_url
            'bibliotecario_id' => Auth::id() // Atribuindo o ID do bibliotecário
        ]);
    
        return redirect()->route('livros.index');
    }

    public function show(Livro $livro)
    {
        return view('livros.show', compact('livro'));
    }

    public function edit(Livro $livro)
    {
        return view('livros.edit', compact('livro'));
    }

    public function update(Request $request, Livro $livro)
    {
        $request->validate([
            'titulo' => 'required|string',
            'autor' => 'required|string',
            'genero' => 'required|string',
            'disponibilidade' => 'required|boolean',
            'imagem_url' => 'nullable|string|max:255' // Adicionando validação para imagem_url
        ]);

        $livro->update([
            'titulo' => $request->input('titulo'),
            'autor' => $request->input('autor'),
            'genero' => $request->input('genero'),
            'disponibilidade' => $request->input('disponibilidade'),
            'imagem_url' => $request->input('imagem_url'), // Atualizando imagem_url
        ]);
        
        return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso.');
    }

    public function destroy(Livro $livro)
    {
        $livro->delete();
        return redirect()->route('livros.index')->with('success', 'Livro excluído com sucesso.');
    }
    public function welcome()
    {
        $destaques = Livro::where('destaque', true)->take(5)->get();
        return view('welcome', compact('destaques'));
    }
    
}
