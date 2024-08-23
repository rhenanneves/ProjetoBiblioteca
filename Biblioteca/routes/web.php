<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\EmprestimoController;

// Rota inicial
Route::get('/', function () {
    return view('welcome');
});

// Rotas para registro de usuários
Route::get('register', [UserController::class, 'create'])->name('register');
Route::post('register', [UserController::class, 'store']);
Route::post('/user/update-profile', [UserController::class, 'updateProfile'])->name('user.update-profile')->middleware('auth');

// Rotas para login e logout
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Rotas para dashboards
Route::get('bibliotecario-admin', [DashboardController::class, 'bibliotecarioAdmin'])->name('bibliotecario-admin')->middleware('auth');
Route::get('bibliotecario', [DashboardController::class, 'bibliotecario'])->name('bibliotecario')->middleware('auth');
route::get('/user-dashboard', [DashboardController::class, 'index'])->name('usuario')->middleware('auth');
// Rotas para o CRUD de usuários
Route::resource('usuarios', UserController::class)->middleware('auth');

// Rotas para o CRUD de livros
Route::resource('livros', LivroController::class)->middleware('auth');

// Rota para o catálogo de livros
Route::get('catalogo-livros', [DashboardController::class, 'catalogoLivros'])->name('catalogo-livros')->middleware('auth');

// Rota para alugar um livro
Route::post('emprestimos/{livro}', [EmprestimoController::class, 'emprestimo'])->name('emprestimo.emprestimo')->middleware('auth');

// Rota para confirmar o empréstimo de um livro
Route::post('emprestimos/confirmar/{livro}', [EmprestimoController::class, 'confirmar'])->name('emprestimos.confirmar')->middleware('auth');


Route::get('/', [LivroController::class, 'welcome'])->name('welcome');
