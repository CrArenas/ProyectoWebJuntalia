@include('menu')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Eventos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    
        #map {
            height: 400px;
            width: 1090px;
            margin-top: 15px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="fondo-eventos">
    <div class="container mt-5">
        <div class="card shadow p-4 mb-4">
        <form action="{{ route('events.update', $event->id) }}" method="PUT">
                @csrf
                @method('PUT')
                <h1 class="testimonial_taital"> Actualización de evento</h1>
            <div class="form-group">
                <label for="city_id" id="form-label-text">Seleccione una Ciudad</label>
                <select name="city_id" id="select-form-control" class="form-control" required>
                    <option value="">Seleccione</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="category_id" id="form-label-text">Seleccione una Categoria</label>
                <select name="category_id" id="select-form-control" class="form-control" required>
                    <option value="">Seleccione</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name" class="form-label" id="form-label-text">Nombre del Evento</label>
                <input class="form-control" type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="description" id="form-label-text" class="form-label">Descripción</label>
                <input class="form-control" type="text" name="description" id="description" required>
            </div>
            <div class="form-group">
                <label for="event_date_time" id="form-label-text">Fecha y Hora</label>
                <input type="datetime-local" name="event_date_time" id="event_date_time" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="age_restriction" id="form-label-text">Restricción de Edad</label>
                <select name="age_restriction" id="select-form-control" class="form-control" required>
                    <option value="Todo público">Todo público</option>
                    <option value="+13">+13</option>
                    <option value="+16">+16</option>
                    <option value="+18">+18</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cost" id="form-label-text">Costo</label>
                <input class="form-control" type="number" name="cost" id="cost" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="status" id="form-label-text">Estado</label>
                <select name="status" id="select-form-control" class="form-control" required>
                    <option value="Activo">Activo</option>
                    <option value="Cancelado">Cancelado</option>
                    <option value="Aplazado">Aplazado</option>
                    <option value="Terminado">Terminado</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pets" id="form-label-text">Permite Mascotas</label>
                <select name="pets" id="select-form-control" class="form-control" required>
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="address" id="form-label-text" class="form-label">Dirección</label>
                <input class="form-control" type="text" name="address" id="address" required>
            </div>

            <input type="hidden" name="event_lat" id="lat" value="{{ old('event_lat', 5.070275) }}">
            <input type="hidden" name="event_lng" id="lng" value="{{ old('event_lng', -75.513817) }}">

            <label for="map" id="form-label-text">Ubicación del Evento</label>
            <div id="map"></div>

            <!-- Leaflet CSS -->
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />

            <!-- Leaflet JS -->
            <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

            <script>
            document.addEventListener('DOMContentLoaded', function () {
                let defaultLat = parseFloat(document.getElementById('lat').value);
                let defaultLng = parseFloat(document.getElementById('lng').value);
                let map = L.map('map').setView([defaultLat, defaultLng], 13);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; OpenStreetMap contributors'
                }).addTo(map);

                let marker = L.marker([defaultLat, defaultLng], { draggable: true }).addTo(map);

                function updateLatLng(lat, lng) {
                    document.getElementById('lat').value = lat;
                    document.getElementById('lng').value = lng;
                }

                marker.on('dragend', function (e) {
                    let position = e.target.getLatLng();
                    updateLatLng(position.lat, position.lng);
                });

                map.on('click', function (e) {
                    marker.setLatLng(e.latlng);
                    updateLatLng(e.latlng.lat, e.latlng.lng);
                });

                updateLatLng(defaultLat, defaultLng);
            });
            </script>

            <button type="submit" class="btn btn-success mt-3 w-100">Actualizar información del evento</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>


@include('footer')