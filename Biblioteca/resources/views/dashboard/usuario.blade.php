<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Usuário</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-navbar {
            background-color: #4CAF50; /* Cor personalizada da navbar */
        }

        .navbar {
            font-family: 'Roboto', sans-serif; /* Fonte personalizada */
        }

        .book-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .book-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
        }

        .book-author {
            font-size: 1rem;
            color: #777;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
            <img src="asset\images\logo.png" alt="Logo" style="height: 50px;">
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
    <div class="container mt-5">
        <h2>Dashboard do Usuário</h2>
        <p>Bem-vindo ao painel de controle, {{ Auth::user()->name }}!</p>
        <p>Aqui você pode visualizar suas informações e acessar suas reservas.</p>

        <!-- Container Meus Livros -->
        <div class="card mt-4">
            <div class="card-header">
                Meus Livros Alugados
            </div>
           <div class="card-body">
                <h5>Livros Alugados:</h5>
                @foreach($loans->where('user_id', $user->id) as $loan)
                    <div class="book-card">
                        <h5 class="book-title">{{ $loan->livro->titulo }}</h5>
                        <p class="book-author">Autor: {{ $loan->livro->autor }}</p>
                        <p>Data do Empréstimo: {{ $loan->created_at->format('d/m/Y') }}</p>
                        <p>Data da Devolução: {{ $loan->data_devolucao ? $loan->data_devolucao->format('d/m/Y') : 'Não devolvido' }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Container Editar Perfil -->
        <div class="card mt-4">
            <div class="card-header">
                Editar Perfil
            </div>
            <div class="card-body">
                <!-- Formulário para editar perfil -->
                <form action="{{ url('/user/update-profile') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Digite uma nova senha se desejar">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
