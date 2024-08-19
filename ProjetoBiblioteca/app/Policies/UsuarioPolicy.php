<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsuarioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create usuarios.
     */
    public function create(User $user)
    {
        return $user->role === 'bibliotecario'; // Permite apenas para bibliotecários
    }

    // Outros métodos da política (update, delete) se necessário
}
