<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
        .form-container {
            background-color: #ffffff; /* Fondo blanco */
            border-radius: 8px; /* Bordes redondeados */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra sutil */
            padding: 2rem; /* Espaciado interno */
            width: 100%;
            max-width: 500px; /* Ancho máximo del contenedor */
            margin: 0 auto; /* Centrado automático */
        }

        /* Estilo del logo (si aplica) */
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
            background-color: #7ab730; /* Color verde */
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
            background-color:#7ab730; /* Color verde más oscuro al pasar el ratón */
        }

        .btn:focus {
            outline: 2px solid #7ab730; /* Borde verde al enfocar */
            outline-offset: 2px; /* Espaciado del borde */
        }

        /* Estilos del enlace de inicio de sesión */
        .login-link {
            display: block; /* Mostrar en bloque */
            text-align: center; /* Alineación del texto */
            margin-top: 1rem; /* Espaciado superior */
            color:#7ab730; /* Color verde */
            text-decoration: none; /* Sin subrayado */
        }

        .login-link:hover {
            text-decoration: underline; /* Subrayado al pasar el ratón */
        }
    </style>
</head>
<body>
    <div class="form-container">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('img/Color.webp') }}" alt="Logo" class="logo">
        </div>

        <!-- Formulario de Registro -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input id="name" class="input-field" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-sm" />
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Correo Electrónico')" />
                <x-text-input id="email" class="input-field" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Contraseña')" />
                <x-text-input id="password" class="input-field" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
                <x-text-input id="password_confirmation" class="input-field" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
            </div>

            <!-- Buttons -->
            <div class="flex items-center justify-between mt-6">
                <button type="submit" class="btn">
                    {{ __('Registrar') }}
                </button>

                <a href="{{ route('login') }}" class="login-link">
                    {{ __('Salir') }}
                </a>
            </div>
        </form>
    </div>

    <!-- Script de reCAPTCHA (si es necesario) -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>
