<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo à Biblioteca</title>
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

        .carousel-item {
            height: 400px; /* Ajuste a altura conforme necessário */
        }

        .carousel-item img {
            width: 100%;
            height: 100%; /* Faz com que a imagem ocupe toda a altura do item do carrossel */
            object-fit: cover; /* Ajusta a imagem para cobrir a área sem distorção */
        }

        .carousel-caption {
            background-color: rgba(0, 0, 0, 0.5); /* Adiciona um fundo semitransparente para o texto */
            padding: 10px;
        }

        .section {
            margin-bottom: 40px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .section h3 {
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        .section p, .section ul {
            font-size: 1rem;
            line-height: 1.6;
        }

        .section ul {
            list-style-type: none;
            padding: 0;
        }

        .section ul li {
            margin-bottom: 10px;
        }

        .section ul li a {
            text-decoration: none;
            color: #4CAF50;
        }

        .section ul li a:hover {
            text-decoration: underline;
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
        <h2>Bem-vindo à Biblioteca</h2>

        <!-- Carrossel de Livros em Destaque -->
        <div id="carouselDestaques" class="carousel slide">
            <div class="carousel-inner">
                @forelse($destaques as $key => $livro)
                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                    @if($livro->imagem_url)
                    <img src="{{ $livro->imagem_url }}" class="d-block w-100" alt="{{ $livro->titulo }}">
                    @endif
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $livro->titulo }}</h5>
                        <p>{{ $livro->autor }} - {{ $livro->genero }}</p>
                    </div>
                </div>
                @empty
                <p>Não há livros em destaque no momento.</p>
                @endforelse
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselDestaques" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselDestaques" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Próximo</span>
            </button>
        </div>

        <!-- Seção Sobre Nós -->
        <div class="section">
            <h3>Sobre Nós</h3>
            <p>Bem-vindo à nossa biblioteca! Aqui você encontrará uma vasta coleção de livros, eventos culturais e muito mais. Nossa missão é promover a leitura e a cultura para todos. Visite-nos para explorar nossos acervos e participar de nossos eventos.</p>
        </div>

        <!-- Seção Novidades -->
        <div class="section">
            <h3>Novidades</h3>
            <ul>
                <li><a href="#">Novo livro do autor XYZ disponível na biblioteca.</a></li>
                <li><a href="#">Próximo evento de lançamento de livro em nossa sede.</a></li>
                <li><a href="#">Atualizações no nosso catálogo de e-books.</a></li>
            </ul>
        </div>

        <!-- Seção Contato -->
        <div class="section">
            <h3>Contato</h3>
            <p>Se você tiver qualquer dúvida ou sugestão, não hesite em nos contatar:</p>
            <ul>
                <li>Email: contato@biblioteca.com</li>
                <li>Telefone: (11) 1234-5678</li>
                <li>Endereço: Rua Exemplo, 123, Cidade - Estado</li>
            </ul>
        </div>

        <!-- Seção Eventos -->
        <div class="section">
            <h3>Eventos</h3>
            <ul>
                <li><a href="#">Clube do Livro - Encontro mensal no dia 15.</a></li>
                <li><a href="#">Palestra sobre literatura contemporânea - 25 de agosto.</a></li>
                <li><a href="#">Feira de Livros usados - 30 de setembro.</a></li>
            </ul>
        </div>

        <!-- Seção Nossos Serviços -->
        <div class="section">
            <h3>Nossos Serviços</h3>
            <p>Além do empréstimo de livros, oferecemos uma variedade de serviços, incluindo:</p>
            <ul>
                <li>Emprestimo de livros físicos e digitais</li>
                <li>Eventos culturais e educativos</li>
                <li>Salas de leitura e estudo</li>
                <li>Apoio à pesquisa e estudos acadêmicos</li>
            </ul>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
