<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <!-- Link a Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.2.7/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Fondo y fuente general */
        body {
            background-color: #f7fafc; /* Fondo suave */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Fuente estándar */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Altura completa del viewport */
            margin: 0; /* Sin márgenes */
        }

        /* Contenedor del formulario */
        .login-container {
            background-color: #ffffff; /* Fondo blanco */
            border-radius: 8px; /* Bordes redondeados */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra sutil */
            padding: 2rem; /* Espaciado interno */
            width: 100%;
            max-width: 400px; /* Ancho máximo del contenedor */
            margin: 0 auto; /* Centrado automático */
        }

        /* Estilo del logo */
        .logo {
            height: 80px; /* Altura fija */
            margin-bottom: 1.5rem; /* Espaciado debajo del logo */
        }

        /* Estilos de los campos de entrada */
        .input-field {
            border: 1px solid #d1d5db; /* Borde gris claro */
            border-radius: 4px; /* Bordes redondeados */
            padding: 0.75rem; /* Espaciado interno */
            width: 100%; /* Ancho completo */
            margin-bottom: 1rem; /* Espaciado debajo */
        }

        .input-field:focus {
            border-color: #7ab730; /* Color verde cuando está en foco */
            outline: none; /* Sin borde de enfoque predeterminado */
        }

        /* Estilos de los botones */
        .btn {
            background-color:#7ab730; /* Color verde */
            color: white; /* Texto blanco */
            padding: 0.75rem 1.5rem; /* Espaciado interno */
            border: none; /* Sin borde */
            border-radius: 4px; /* Bordes redondeados */
            cursor: pointer; /* Cursor de puntero */
            font-size: 1rem; /* Tamaño de fuente */
            font-weight: 500; /* Peso de fuente */
            text-align: center; /* Alineación del texto */
            display: inline-block; /* Mostrar en línea con espaciado */
            width: 100%; /* Ancho completo */
        }

        .btn:hover {
            background-color: #2f855a; /* Color verde más oscuro al pasar el ratón */
        }

        .btn:focus {
            outline: 2px solid #7ab730; /* Borde verde al enfocar */
            outline-offset: 2px; /* Espaciado del borde */
        }

        /* Estilos del enlace de registro */
        .register-link {
            display: block; /* Mostrar en bloque */
            text-align: center; /* Alineación del texto */
            margin-top: 1rem; /* Espaciado superior */
            color:#7ab730; /* Color verde */
            text-decoration: none; /* Sin subrayado */
        }

        .register-link:hover {
            text-decoration: underline; /* Subrayado al pasar el ratón */
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('img/Color.webp') }}" alt="Logo" class="logo">
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-green-600 text-center">
                {{ session('status') }}
            </div>
        @endif

        <!-- Formulario de Login -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" class="input-field" value="{{ old('email') }}" required autofocus autocomplete="username">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" class="input-field" required autocomplete="current-password">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- reCAPTCHA -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">{{ __('reCAPTCHA') }}</label>
                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                @error('g-recaptcha-response')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Buttons -->
            <button type="submit" class="btn">
                {{ __('Iniciar sesión') }}
            </button>

            <a href="{{ route('register') }}" class="register-link">
                {{ __('Registrarse') }}
            </a>
        </form>
    </div>

    <!-- Script de reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>