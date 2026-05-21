<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- Responsive -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        .navbar-custom {
            position: fixed; 
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000; 
            padding-top: 10px;
            padding-bottom: 10px;
            background-color: rgb(187, 61, 61);
        }

        .navbar-custom .nav-link,
        .navbar-custom .btn-secondary {
            color: rgb(255, 255, 255) !important;
        }

        .navbar-custom .btn-secondary i {
            color: #191919 !important;
        }

        .search-bar {
            width: 300px;
        }

        body {
            margin: 0;
            padding: 0;
            padding-top: 60px; 
        }

        /* Estilo para el botón de Inicio */
        .inicio-btn {
            background-color: rgb(128, 41, 41);
            color: #fff !important;
            padding: 8px 16px;
            border-radius: 25px;
            font-weight: bold;
            transition: background-color 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .inicio-btn:hover {
            background-color: rgb(194, 66, 66);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
            text-decoration: none;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
            @if(Auth::check())
                <a class="nav-link me-3 inicio-btn" href="/home">Inicio</a>
            @endif
            @if(!Auth::check())
                <a class="nav-link me-3 inicio-btn" href="/">Inicio</a>
            @endif
            </div>
            <ul class="navbar-nav d-flex align-items-center">
                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="/my-events"><i class="bi bi-house"></i> Mis Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/my-inscriptions"><i class="bi bi-house"></i> Mis inscripciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/events"><i class="bi bi-house"></i> Crear evento</a>
                    </li>
                @endif
                @if(Auth::check() && Auth::user()->rol_id == 1)
                <li class="nav-item">
                        <a class="nav-link" href="/reports"><i class="bi bi-file-earmark-text"></i> Generar reportes</a>
                    </li>
                @endif

                @if(!Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="/register"><i class="bi bi-star"></i> Registrarse</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="/login"><i class="bi bi-gear"></i> Iniciar sesión</a>
                </li>
                @endif

                @if(Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            🐶​ {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                @if(Auth::check() && Auth::user()->rol_id == 1)
                                <form action="{{ route('administration') }}" method="GET">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <a class="bi bi-box-arrow-right" href="/administration"></a> Panel de administración
                                    </button>
                                </form>
                                @endif
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        let errorMessage = "{{ session('error') }}"; // Captura el mensaje de error de la sesión
        if (errorMessage) {
            alert(errorMessage); // Muestra la alerta con el mensaje de error
        }
    });
</script>
</body>
</html>
