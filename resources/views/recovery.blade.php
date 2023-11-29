<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/recovery.css') }}">
    <script src="https://kit.fontawesome.com/ff25aeb8ee.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@realrashid/sweet-alert@3"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/sweetAlert.js') }}"></script>
    <title>Recuperar Acesso :: FinaB</title>
</head>
<body class="login-body-container">
    <div class="recovery-container">
        <h1>Recuperação de Acesso</h1>
        <p>Informe seu endereço de e-mail abaixo. Enviaremos instruções para recuperar sua senha.</p>
        <div class="input-container">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="Seu endereço de e-mail">
        </div>
        <button class="recover-button">Recuperar</button>
    </div>
<script>
    // TODO - Implementar logica de recuperacao de senha
</script>
</body>
</html>
