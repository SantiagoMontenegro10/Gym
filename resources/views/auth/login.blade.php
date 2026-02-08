<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('bootstrap4/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('inicio/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/fontawesome.min.css') }}">
    <link href="https://tresplazas.com/web/img/big_punto_de_venta.png" rel="shortcut icon">
    <title>Inicio de sesión</title>
</head>

<body class="login-body">

    <!-- FONDO -->
    <div class="login-bg"></div>

    <!-- CONTENEDOR LOGIN -->
    <div class="login-wrapper">
        <div class="login-card">

            <h2 class="login-title">BIENVENIDO</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                @if (session('mensaje'))
                    <div class="alert alert-warning mb-2">
                        <small>{{ session('mensaje') }}</small>
                    </div>
                @endif

                {{-- ERRORES --}}
                @error('usuario')
                    <div class="alert alert-danger mb-2">
                        <small>{{ $message }}</small>
                    </div>
                @enderror
                @error('password')
                    <div class="alert alert-danger mb-2">
                        <small>{{ $message }}</small>
                    </div>
                @enderror

                <!-- USUARIO -->
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input
                        type="text"
                        name="usuario"
                        placeholder="Usuario"
                        value="{{ old('usuario') }}"
                        required>
                </div>

                <!-- PASSWORD -->
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input
                        type="password"
                        name="password"
                        placeholder="Contraseña"
                        required>
                </div>

                <div class="text-end mb-3">
                    <a href="{{ route('recuperar.index') }}" class="forgot">
                        Olvidé mi contraseña
                    </a>
                </div>

                <button type="submit" class="btn-login">
                    INICIAR SESIÓN
                </button>

            </form>

        </div>
    </div>

    <script src="{{ asset('bootstrap4/js/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap4/js/bootstrap.bundle.js') }}"></script>
</body>


</html>
