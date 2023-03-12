<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Incidencias Ruiz Gijon</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <div class="d-flex flex-column align-items-center justify-content-center text-center vh-100">

                <h1 class="display-3">Centro de Incidencias Informáticas</h1>

                <div class="my-4" style="max-height: 20rem">
                    <img src="img/logo.png" alt="Logo" class="w-100 h-100">
                </div>
                
                <div>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-decoration-none text-reset">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-decoration-none text-reset mx-4">Iniciar Sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-decoration-none text-reset mx-4">Registrarse</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </body>
</html>
