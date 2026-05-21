<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Evento</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h1>Reporte de Evento</h1>

    <p><strong>ID del Evento:</strong> {{ $event->id }}</p>
    <p><strong>Nombre:</strong> {{ $event->name }}</p>
    <p><strong>Descripción:</strong> {{ $event->description }}</p>
    <p><strong>Fecha:</strong> {{ $event->event_date }}</p>
    <p><strong>Hora:</strong> {{ $event->event_time }}</p>
    <p><strong>Ubicación:</strong> {{ $event->address }}</p>
    <p><strong>Estado:</strong> {{ $event->status }}</p>

    <h3>Detalles del Evento</h3>
    <table>
        <tr>
            <th>Categoría</th>
            <td>{{ $event->category->name }}</td>
        </tr>
        <tr>
            <th>Ciudad</th>
            <td>{{ $event->city->name }}</td>
        </tr>
        <tr>
            <th>Costo</th>
            <td>${{ number_format($event->cost, 2) }}</td>
        </tr>
    </table>

    <h3>Personas Inscritas</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
        </tr>
        @foreach ($event->inscriptions as $inscription)
            <tr>
                <td>{{ $inscription->user->id }}</td>
                <td>{{ $inscription->user->name }}</td>
                <td>{{ $inscription->user->email }}</td>
            </tr>
        @endforeach
    </table>

</body>
</html>
