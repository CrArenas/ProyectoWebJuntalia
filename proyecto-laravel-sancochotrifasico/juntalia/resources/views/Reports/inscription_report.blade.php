<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Inscripciones</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h1>Reporte de Inscripciones</h1>

    <h2>Usuario con más Inscripciones</h2>
    <p><strong>Nombre:</strong> {{ $topUser->name }}</p>
    <p><strong>Email:</strong> {{ $topUser->email }}</p>
    <p><strong>Cantidad de Inscripciones:</strong> {{ $topUser->inscriptions_count }}</p>

    <h3>Eventos Inscritos</h3>
    <table>
        <tr>
            <th>ID del Evento</th>
            <th>Nombre</th>
            <!--<th>Fecha</th>-->
            <th>Ubicación</th>
        </tr>
        @foreach ($topUser->inscriptions as $inscription)
            <tr>
                <td>{{ $inscription->event->id }}</td>
                <td>{{ $inscription->event->name }}</td>
                <!--<td>{{ $inscription->event->event_date }}</td>-->
                <td>{{ $inscription->event->address }}</td>
            </tr>
        @endforeach
    </table>

</body>
</html>
