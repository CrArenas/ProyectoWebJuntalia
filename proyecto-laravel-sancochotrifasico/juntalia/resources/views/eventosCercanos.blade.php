<!--
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
                        <p class="card-text"><strong>📅 Fecha:</strong> ${evento.event_date_time}</p>
                        <a href="#" class="btn btn-primary mt-auto">Ver más</a>
                    </div>
                </div>
            `;

            contenedor.appendChild(col);
        });
    }
</script>

-->

