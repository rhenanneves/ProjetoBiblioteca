<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Livros</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-navbar {
            background-color: #4CAF50; /* Cor personalizada da navbar */
        }

        .navbar {
            font-family: 'Roboto', sans-serif; /* Fonte personalizada */
        }

        .page-content {
            font-family: 'Roboto', sans-serif; /* Aplicando a mesma fonte da navbar */
            padding: 20px;
        }

        .book-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .book-title {
            font-size: 1.5rem;
            color: #333;
        }

        .book-author {
            font-size: 1.2rem;
            color: #555;
        }

        .book-genre {
            font-size: 1rem;
            color: #777;
        }

        .book-availability {
            font-size: 1rem;
            color: #4CAF50; /* Verde para indicar disponibilidade */
        }

        .btn-custom {
            background-color: #4CAF50;
            color: #fff;
        }

        .btn-custom:hover {
            background-color: #45a049;
            color: #fff;
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
                        <a class="nav-link" href="/livros">Livros</a>
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
                        <a class="nav-link" href="bibliotecario-admin">
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
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Lista de Livros</h2>
            <a href="{{ route('livros.create') }}" class="btn btn-custom">Adicionar Novo Livro</a>
        </div>
        @foreach($livros as $livro)
        <div class="book-card">
            <h3 class="book-title">{{ $livro->titulo }}</h3>
            <p class="book-author">Autor: {{ $livro->autor }}</p>
            <p class="book-genre">Gênero: {{ $livro->genero }}</p>
            <p class="book-availability">Disponibilidade: {{ $livro->disponibilidade }}</p>
            <div class="d-flex justify-content-end">
                <a href="{{ route('livros.edit', $livro->id) }}" class="btn btn-warning me-2">Editar</a>
                <form action="{{ route('livros.destroy', $livro->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja apagar este livro?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Apagar</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
