<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
