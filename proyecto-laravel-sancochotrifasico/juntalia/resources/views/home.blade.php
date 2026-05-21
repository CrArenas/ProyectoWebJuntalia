@include('menu')

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Juntalia</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <!-- fevicon -->
    <link rel="icon" href="{{asset('assets/images/fevicon.png')}}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/jquery.mCustomScrollbar.min.css')}}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
    <!-- owl stylesheets --> 
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <style>
    .evento-card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .evento-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }

    .evento-card .card-title {
        font-weight: bold;
        font-size: 1.4rem;
        color:rgb(117, 34, 41)
    }

    .evento-card .btn-primary {
        background-color:rgb(129, 48, 48);
        border: none;
        transition: background-color 0.3s ease;
    }

    .evento-card .btn-primary:hover {
        background-color: #ff4757;
    }

    /* Centrar el mensaje cuando no hay eventos */
    #eventos-cercanos p {
        font-size: 1.2rem;
        color: #888;
    }
</style>

</head>
<body>
@include('menu')

<section class="event_categories_section">
    <h2 class="categories_title">Categorías de Eventos</h2>
    <div class="categories_container">
    <a href="{{ route('events.byCategory', 1) }}" class="category_card">
        <img src="{{ asset('assets/images/taller.png') }}" alt="Taller">
        <h4>Taller</h4>
    </a>
    <a href="{{ route('events.byCategory', 2) }}" class="category_card">
        <img src="{{ asset('assets/images/conferencia.png') }}" alt="Conferencia">
        <h4>Conferencia</h4>
    </a>
    <a href="{{ route('events.byCategory', 3) }}" class="category_card">
        <img src="{{ asset('assets/images/seminario.png') }}" alt="Seminario">
        <h4>Seminario</h4>
    </a>
    <a href="{{ route('events.byCategory', 4) }}" class="category_card">
        <img src="{{ asset('assets/images/concierto.png') }}" alt="Concierto">
        <h4>Concierto</h4>
    </a>
    <a href="{{ route('events.byCategory', 5) }}" class="category_card">
        <img src="{{ asset('assets/images/exhibicion.png') }}" alt="Exhibición">
        <h4>Exhibición</h4>
    </a>
</div>

<div class="categories_container">
    <a href="{{ route('events.byCategory', 6) }}" class="category_card">
        <img src="{{ asset('assets/images/festival.png') }}" alt="Festival">
        <h4>Festival</h4>
    </a>
    <a href="{{ route('events.byCategory', 7) }}" class="category_card">
        <img src="{{ asset('assets/images/reunion.png') }}" alt="Reunión">
        <h4>Reunión</h4>
    </a>
    <a href="{{ route('events.byCategory', 8) }}" class="category_card">
        <img src="{{ asset('assets/images/webinar.png') }}" alt="Webinar">
        <h4>Webinar</h4>
    </a>
    <a href="{{ route('events.byCategory', 9) }}" class="category_card">
        <img src="{{ asset('assets/images/caridad.png') }}" alt="Evento de Caridad">
        <h4>Evento de Caridad</h4>
    </a>
    <a href="{{ route('events.byCategory', 10) }}" class="category_card">
        <img src="{{ asset('assets/images/entrenamiento.png') }}" alt="Entrenamiento">
        <h4>Entrenamiento</h4>
    </a>
</div>

</section>



<div class="container mt-5">
    <h1 class="testimonial_taital">🎉 Eventos Cercanos 🎉</h1>
    <div id="eventos-cercanos" class="row justify-content-center">Cargando eventos...</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                let lat = position.coords.latitude;
                let lng = position.coords.longitude;

                console.log(`Ubicación obtenida: Latitud ${lat}, Longitud ${lng}`);

                fetch(`/eventos-cercanos?lat=${lat}&lng=${lng}`)
                    .then(response => response.json())
                    .then(data => mostrarEventos(data))
                    .catch(error => console.error('Error al obtener eventos:', error));
            }, function (error) {
                console.error('No se pudo obtener la ubicación:', error.message);
            });
        } else {
            console.error('Geolocalización no soportada por este navegador');
        }
    });

    function mostrarEventos(eventos) {
        let contenedor = document.getElementById('eventos-cercanos');
        contenedor.innerHTML = '';

        if (eventos.length === 0) {
            contenedor.innerHTML = '<p class="text-center">😔 No hay eventos cercanos disponibles.</p>';
            return;
        }

        eventos.forEach(evento => {
            let col = document.createElement('div');
            col.classList.add('col-md-4', 'mb-4');

            col.innerHTML = `
                <div class="card evento-card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text">${evento.name}</h5>
                        <p class="card-text flex-grow-1">${evento.description}</p>
                        <p class="card-text"><strong> Fecha:</strong> ${evento.event_date_time}</p>
                        <p class="card-text"><strong> Estado:</strong> ${evento.status}</p>
                        <a href="/event/${evento.id}" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            `;

            contenedor.appendChild(col);
        });
    }
</script>

<div class="mascota-container">
    <img src="{{asset('assets/images/Mascota-Feliz.jpeg')}}" alt="Mascota" class="mascota-imagen">
    <div class="burbuja-texto">
        <span style="font-weight: bold;">Junior: </span>
        ¡Bienvenido a Juntalia! Este es tu panel de inicio de sesión, acá podrás inscribirte a diversos eventos.😼🎉 Además, también 
        podrás crear tus propios eventos para que otras personas asistan (si no me invitan lo borraré 😾​). Cuentas también con una 
        nueva sección para filtrar los eventos por categorías (escoge la que más te llame la atención😸). Y... por último, hay otra 
        sección para poder ver qué eventos están cercanos a ti (gracias al consumo de una API externa ​😼​💪​).
    </div>
</div>

@include('footer')

<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-3.0.0.min.js')}}"></script>
<script src="{{asset('assets/js/plugin.js')}}"></script>
<!-- sidebar -->
<script src="{{asset('assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<!-- javascript --> 
<script src="{{asset('assets/js/owl.carousel.js')}}"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>  
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "100%";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script> 
</body>
</html>
