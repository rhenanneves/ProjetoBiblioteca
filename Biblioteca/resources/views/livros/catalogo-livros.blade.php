<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Livros</title>
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

        .book-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 20px;
            background-color: #fff;
        }

        .book-image {
            flex-shrink: 0;
            width: 120px;
            height: 180px;
            border-radius: 8px;
            overflow: hidden;
            background-color: #f0f0f0;
        }

        .book-image img {
            width: 100%;
            height: auto;
        }

        .book-details {
            flex: 1;
        }

        .book-title {
            font-size: 1.6rem;
            color: #333;
            margin: 0;
        }

        .book-author {
            font-size: 1.2rem;
            color: #555;
        }

        .btn-custom {
            background-color: #4CAF50;
            color: #fff;
        }

        .btn-custom:hover {
            background-color: #45a049;
        }

        .alert {
            margin-bottom: 20px;
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
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Auth::user()->is_bibliotecario ? route('bibliotecario-admin') : route('usuario') }}">
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
        <h2 class="mb-4">Catálogo de Livros</h2>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        @forelse($livros as $livro)
        <div class="book-card">
            <!-- Imagem do livro -->
            @if($livro->imagem_url)
            <div class="book-image">
                <img src="{{ $livro->imagem_url }}" alt="{{ $livro->titulo }}">
            </div>
            @endif

            <div class="book-details">
                <h5 class="book-title">{{ $livro->titulo }}</h5>
                <p class="book-author">Autor: {{ $livro->autor }}</p>
                <p>Gênero: {{ $livro->genero }}</p>
                <p>Status: {{ $livro->disponibilidade ? 'Disponível' : 'Indisponível' }}</p>

                <!-- Botão de Alugar -->
                @if($livro->disponibilidade)
                <form action="{{ route('emprestimo.emprestimo', $livro->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-custom">Alugar</button>
                </form>
                @else
                <button type="button" class="btn btn-secondary" disabled>Indisponível</button>
                @endif
            </div>
        </div>
        @empty
        <p>Não há livros cadastrados.</p>
        @endforelse
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
