<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="icon" href="imagenes/ryr.png" type="image">
    <title>Iniciar sesión</title>
</head>

<body>
    <div class="container">
        <!-- Inicio de sesión -->
        <form id="login-form" class="form" action="{{ route('login') }}" method="POST">
                @csrf
            <input type="hidden" name="form_type" value="login">
            <img src="imagenes/ryr.png" alt="Logo" class="login-logo">
            <h2>Iniciar sesión</h2>
            <input type="text"  name="email" :value="old('email')" required autofocus autocomplete="username">
            <input type="password"  name="password"  required autocomplete="current-password">
            <button type="submit" class="btn">Iniciar sesión</button>
            <a class="switch-text" href="{{ route('password.request') }}">Olvide mi contraseña</a>
            <p class="switch-text">¿No tienes una cuenta?</p>
            <button type="button" onclick="showRegister()" class="switch-link">Regístrate aquí</button>
            <!-- Mensaje de error para inicio de sesión -->
            <div id="login-error-message" class="error-message"></div>
        </form>

        <!-- Registrarse -->
        <form id="register-form" class="form hidden" action="{{ route('register') }}" method="POST">
                @csrf
            <img src="imagenes/ryr.png" alt="Logo" class="login-logo">
            <h2>Registrarse</h2>
            <input type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Nombre de Usuario" required>
            <input type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Correo electrónico" required>
            <input type="password"  name="password" required autocomplete="new-password" placeholder="Contraseña" required>
            <input type="password"  name="password_confirmation" required autocomplete="new-password" placeholder="Contraseña" required>
            <button type="submit" class="btn">Registrarse</button>
            <p class="switch-text">¿Ya tienes una cuenta?</p>
            <button type="button" onclick="showLogin()" class="switch-link">Inicia sesión aquí</button>
            <!-- Mensaje de error para registro -->
            <div id="register-error-message" class="error-message"></div>
        </form>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
