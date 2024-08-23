<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <style>
        .custom-navbar {
            background-color: #4CAF50; /* Cor personalizada da navbar */
        }

        .navbar {
            font-family: 'Roboto', sans-serif; /* Fonte personalizada */
        }

        .form-container {
            max-width: 400px; /* Largura máxima do formulário */
            margin: 50px auto; /* Centraliza o formulário vertical e horizontalmente */
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff; /* Cor de fundo branca */
        }

        .form-container h2 {
            margin-bottom: 20px;
            color: #4CAF50; /* Cor personalizada para o título */
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input {
            border-radius: 4px;
            border: 1px solid #ced4da;
            padding: 10px;
        }

        .form-group input:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.25);
        }

        .btn-primary {
            background-color: #4CAF50;
            border: none;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }

        .alert-danger {
            border: 1px solid #f5c6cb;
            background-color: #f8d7da;
            color: #721c24;
        }

        .alert-danger ul {
            margin: 0;
            padding-left: 20px;
        }

        .alert-danger li {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="/" style="font-size: 15px; font-family:Verdana, Geneva, Tahoma, sans-serif">
            <img src="asset\images\logo.png" alt="Logo" style="height: 50px;">
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
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Olá, {{ Auth::user()->name }} <!-- Exibe o nome do usuário autenticado -->
                            </a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ url('/logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link" style="text-decoration: none;">Sair</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/register') }}">Registre-se</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo Principal -->
    <div class="container">
        <div class="form-container">
            <h2 class="text-center">Cadastro de Usuário</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label for="password">Senha:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmar Senha:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="is_bibliotecario">É Bibliotecário:</label>
                    <input type="checkbox" name="is_bibliotecario" id="is_bibliotecario" value="1">
                </div>
                <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
