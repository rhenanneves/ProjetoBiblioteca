<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração do Bibliotecário</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-navbar {
            background-color: #4CAF50;
        }

        .navbar {
            font-family: 'Roboto', sans-serif;
        }

        .page-content {
            font-family: 'Roboto', sans-serif;
            padding: 20px;
        }

        .admin-button {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 50px;">
                "Ler é mergulhar em um mar de conhecimento"
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/catalogo-livros">Livros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/sobre">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contato">Contato</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Olá, {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ url('/logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link" style="text-decoration: none;">Sair</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo Principal -->
    <div class="container page-content mt-5">
        <h2>Administração do Bibliotecário</h2>
        <a href="{{ route('livros.index') }}" class="btn btn-primary admin-button">Gerenciar Livros</a>
        <a href="{{ route('bibliotecario') }}" class="btn btn-secondary admin-button">Gerenciar Usuários</a>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
