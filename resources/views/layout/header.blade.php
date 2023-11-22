<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>Home :: FinaB</title>
    <script src="https://kit.fontawesome.com/ff25aeb8ee.js" crossorigin="anonymous"></script>
    @yield('content-style')
    @yield('sidebar-style')
    @yield('footer-style')
</head>
<body>
    <div class="grid-container">
        <header class="header">
            <nav class="text-white navbar navbar-expand-lg navbar-dark">
                <div class="container">
                    <a class="navbar-brand" href="#"><img id="home-logo" src="{{ asset('assets/logo.png') }}" alt="logo"></a>
                </div>
                <div class="logout-icon">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </div>
            </nav>
        </header>   
        @yield('content') 
        @yield('sidebar') 
        @yield('footer')
