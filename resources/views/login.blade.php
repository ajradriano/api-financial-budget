<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Login :: FinaB</title>
</head>
<body class="login-body-container">
<div class="login-container">
    <h1>Entrar</h1>
    <div class="form mb-2">
        <form method="POST" id="loginForm">
            @csrf
            <div class="input-container">
                <label for="email">E-mail:</label>
                <input type="email" id="email" value="deverson@mail.com" name="email" placeholder="Seu e-mail">
            </div>
            <div class="input-container">
                <label for="password">Senha:</label>
                <input type="password" id="password" value="deverson" name="password" placeholder="Sua senha">
            </div>
        <button type="submit" class="login-button">Entrar</button>
        </form>
    </div>
    <div class="forgot-password">
        <a  href="{{ route('recovery') }}">Esqueci a senha <i class="fa-regular fa-face-sad-tear"></i></a>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#loginForm').submit(function (e) {
            e.preventDefault();
            let email = $('#email').val();
            let password = $('#password').val();
            $.ajax({
                url: '{{ url("api/auth") }}',
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    email,
                    password
                },
                success: function (response) {
                    sessionStorage.setItem('token', response.token);
                    setHeaders();
                    window.location.href = "dashboard";
                },
                error: function (response) {
                    console.log(response)
                }
            })
        })
    })
</script>
</body>
</html>
