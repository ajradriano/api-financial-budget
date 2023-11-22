<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>Home :: FinaB</title>
</head>
<body>
<header class="text-white">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><img id="home-logo" src="{{ asset('assets/logo.png') }}" alt="logo"></a>
        </div>
        <div class="logout-icon">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
        </div>
    </nav>
</header>
<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Páginas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Postagens
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Configurações
                </a>
            </li>
            <!-- Adicione outros itens de menu conforme necessário -->
        </ul>
    </div>
</nav>
<main>
    <!-- Conteúdo do seu site vai aqui. Este é o espaço para o conteúdo gerenciado pelo CMS. -->
    <script src="https://kit.fontawesome.com/ff25aeb8ee.js" crossorigin="anonymous"></script>
</main>
</body>
</html>
