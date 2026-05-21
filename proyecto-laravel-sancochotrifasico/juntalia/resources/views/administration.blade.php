<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes Juntalia</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('menu')
    <div class="main_content">
    <div class="container-center-administration">
        <div class="report-container">
            <div class="report-box">
                <h1 class="testimonial_taital">Panel de administración</h1>
                <a href="http://localhost:5173/Ini" target="_blank" class="reports_btn">Ventana de usuarios</a><!--RUTA QUE CONECTA CON EL REACt-->
                <!--<a href="{{ route('inscriptions.index') }}" class="reports_btn">Ventana de usuarios</a>-->
                <a href="{{ route('inscriptions.index') }}" class="reports_btn">Ventana de inscripciones</a>
                <a href="{{ route('cities.index') }}" class="reports_btn">Ventana de ciudades</a>
                <a href="{{ route('events.index') }}" class="reports_btn">Ventana de eventos</a>
            </div>
        </div>
    </div>
</div>

    <div class="mascota-container">
    <img src="{{asset('assets/images/Mascota-Seria.jpeg')}}" alt="Mascota" class="mascota-imagen">
        <div class="burbuja-texto">
            <span style="font-weight: bold;">Junior: </span>
            ¡Hola administrador! Este es el panel más importante de la página web, ten cuidado con la información que aquí manipulas.
            Puedes editar y eliminar eventos, ciudades, inscripciones y usuarios. 😿​
        </div>
    </div>

    @include('footer')
    
</body>
</html>