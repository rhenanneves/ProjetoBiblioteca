<?php

// app/Providers/AuthServiceProvider.php

namespace App\Providers;

use App\Models\Usuario;
use App\Policies\UsuarioPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Usuario::class => UsuarioPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
