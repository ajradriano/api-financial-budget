<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    
    <title>Home :: FinaB</title>
    <script src="https://kit.fontawesome.com/ff25aeb8ee.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@realrashid/sweet-alert@3"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @include('sweetalert::alert')
    @yield('content-style')
    @yield('sidebar-style')
    @yield('footer-style')
    @if(session('alert'))
        {!! Alert::render() !!}
    @endif
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

    {{-- Obs: Não fechar as tags, pois o fechamento delas está em outro arquivo --}}