<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LivroController;
use App\Http\Middleware\CheckAuthenticated;

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
Route::get('bibliotecario-dashboard', [DashboardController::class, 'bibliotecario'])->name('bibliotecario-dashboard')->middleware('auth');
Route::get('bibliotecario-admin', function () {
    return view('dashboard.bibliotecario-admin');
})->name('bibliotecario-admin')->middleware('auth');
Route::get('/user-dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Rotas para o CRUD de usuários
Route::resource('usuarios', UserController::class)->middleware('auth');

// Rotas para o CRUD de livros
Route::resource('livros', LivroController::class)->middleware('auth');

// Rota para o catálogo de livros
Route::get('catalogo-livros', [DashboardController::class, 'catalogoLivros'])->name('catalogo-livros')->middleware('auth');
