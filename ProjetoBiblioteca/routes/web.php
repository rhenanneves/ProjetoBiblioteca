<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmprestimoController;

Route::get('/', function () {
    return view('welcome');
});

// Rota do dashboard protegida
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas protegidas por autenticação
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas do Livro
    Route::resource('livros', LivroController::class);

    // Rotas do Usuario
    Route::resource('usuarios', UsuarioController::class);

    // Rotas do Emprestimo
    Route::resource('emprestimos', EmprestimoController::class);
});

require __DIR__.'/auth.php';
