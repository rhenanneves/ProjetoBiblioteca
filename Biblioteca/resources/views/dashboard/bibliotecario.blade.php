<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard do Bibliotecário</title>
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

        .user-card, .book-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .user-name, .book-title {
            font-size: 1.5rem;
            color: #333;
        }

        .book-author {
            font-size: 1.2rem;
            color: #555;
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
        <h2>Dashboard do Bibliotecário</h2>

        <!-- Listagem de Usuários -->
        <div class="user-list mb-5">
            <h3>Usuários</h3>
            @foreach($users as $user)
                <div class="user-card">
                    <h4 class="user-name">{{ $user->name }}</h4>
                    <p>Email: {{ $user->email }}</p>
                    <p>Data de Cadastro: {{ $user->created_at->format('d/m/Y') }}</p>
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
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
