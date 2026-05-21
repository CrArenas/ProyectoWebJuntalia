document.addEventListener('DOMContentLoaded', function () {
    // Verifica si el navegador soporta geolocalización
    if (navigator.geolocation) {
        // Obtiene la ubicación del usuario
        navigator.geolocation.getCurrentPosition(function (position) {
            let lat = position.coords.latitude;
            let lng = position.coords.longitude;

            console.log(`Ubicación obtenida: Latitud ${lat}, Longitud ${lng}`);

            // Llamar a la API para obtener eventos cercanos
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

// Función para mostrar eventos en la página
function mostrarEventos(eventos) {
    let contenedor = document.getElementById('eventos-cercanos');
    contenedor.innerHTML = ''; // Limpia el contenedor antes de agregar nuevos eventos

    if (eventos.length === 0) {
        contenedor.innerHTML = '<p>No hay eventos cercanos disponibles.</p>';
        return;
    }

    eventos.forEach(evento => {
        let div = document.createElement('div');
        div.classList.add('evento');
        div.innerHTML = `<h3>${evento.nombre}</h3>
                         <p>${evento.descripcion}</p>
                         <p>Fecha: ${evento.fecha}</p>
                         <p>Distancia: ${evento.distancia.toFixed(2)} km</p>`;
        contenedor.appendChild(div);
    });
}
