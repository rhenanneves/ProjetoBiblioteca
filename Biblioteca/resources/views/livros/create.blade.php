<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Novo Livro</title>
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

        .btn-custom {
            background-color: #4CAF50; /* Cor personalizada do botão */
            color: #fff;
        }

        .btn-custom:hover {
            background-color: #45a049;
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
        <h2>Adicionar Novo Livro</h2>
        <form action="{{ route('livros.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="mb-3">
                <label for="autor" class="form-label">Autor</label>
                <input type="text" class="form-control" id="autor" name="autor" required>
            </div>
            <div class="mb-3">
                <label for="genero" class="form-label">Gênero</label>
                <input type="text" class="form-control" id="genero" name="genero" required>
            </div>
            <div class="mb-3">
                <label for="disponibilidade" class="form-label">Disponibilidade</label>
                <select id="disponibilidade" name="disponibilidade" class="form-select" required>
                    <option value="" disabled selected>Selecione a disponibilidade</option>
                    <option value="1">Disponível</option>
                    <option value="0">Indisponível</option>
                </select>
            </div>
            <button type="submit" class="btn btn-custom">Salvar</button>
            <a href="{{ route('livros.index') }}" class="btn btn-secondary">Voltar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
