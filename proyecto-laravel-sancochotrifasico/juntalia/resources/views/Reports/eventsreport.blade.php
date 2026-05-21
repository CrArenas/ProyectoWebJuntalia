<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Eventos</title>
</head>
<body>
    @include('menu')

    <div class="container mt-5">
        <h1>Generar Reporte de Eventos</h1>

        <form action="{{ route('generateReportevents') }}" method="POST">
            @csrf

            <!-- Campo para seleccionar el evento -->
            <div class="form-group">
                <label for="event_id">Seleccione el Evento:</label>
                <select class="form-control" id="event_id" name="event_id" required>
                    <option value="">-- Seleccione un evento --</option>
                    @foreach ($events as $event)
                        <option value="{{ $event->id }}">
                            ID: {{ $event->id }} - {{ $event->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Generar Reporte</button>
            <a href="{{ route('reports.inscriptions') }}" class="btn btn-secondary">Generar reporte de Inscripciones</a>
            <a href="{{ route('reports.index') }}" class="btn btn-primary">Volver</a>
        </form>

        <!-- Mostrar inscritos en el evento seleccionado -->
        @if(isset($event))
            <h2 class="mt-4">Personas inscritas en el evento: {{ $event->name }}</h2>
            <ul class="list-group">
                @foreach ($event->inscriptions as $inscription)
                    <li class="list-group-item">
                        {{ $inscription->user->name }} - {{ $inscription->user->email }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    @include('footer')
</body>
</html>
