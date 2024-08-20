<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

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
Route::get('bibliotecario-dashboard', function () {
    return view('bibliotecario-dashboard');
})->name('bibliotecario-dashboard')->middleware('auth');



Route::get('/user-dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

