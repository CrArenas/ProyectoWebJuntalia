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
    <div class="container-center">
        <div class="report-container">
            <div class="report-box">
                <h1 class="testimonial_taital">Reportes</h1>
                <a href="{{ route('reports.inscriptions') }}" class="reports_btn">Generar reporte de Inscripciones</a>
                <a href="{{ route('reports.events') }}" class="reports_btn">Generar reporte de eventos</a>
            </div>
            <div class="report-box">
                <h1 class="testimonial_taital">Estadísticas</h1>
                <a href="{{ route('reports.events.chart') }}" class="reports_btn">Ver Estadísticas de Evento</a>
                <a href="{{ route('reports.inscriptions.chart') }}" class="reports_btn">Ver Estadísticas de Inscripciones</a>
            </div>
        </div>
    </div>
</div>

    <div class="mascota-container">
    <img src="{{asset('assets/images/Mascota-Seria.jpeg')}}" alt="Mascota" class="mascota-imagen">
        <div class="burbuja-texto">
            <span style="font-weight: bold;">Junior: </span>
            ¡Hola administrador! Acá en esta panel podrás generar reportes  (tanto PDF como EXCEL) acerca de los datos de nuestra
            página web, te recomiendo tener cuidado con esa información porque es extremadamente confidencial. 😾​
        </div>
    </div>

    @include('footer')
    
</body>
</html>