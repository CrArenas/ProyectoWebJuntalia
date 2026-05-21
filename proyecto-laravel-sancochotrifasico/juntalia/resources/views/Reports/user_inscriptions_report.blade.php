<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Inscripciones del Usuario</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h1>Reporte de Inscripciones de {{ $user->name }}</h1>
    <p><strong>Email:</strong> {{ $user->email }}</p>

    <h3>Eventos Inscritos:</h3>
    <table>
        <thead>
            <tr>
                <th>ID Inscripción</th>
                <th>ID Evento</th>
                <th>Evento</th>
                <!-- <th>Fecha de Inscripción</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach ($user->inscriptions as $inscription)
                <tr>
                    <td>{{ $inscription->id }}</td>
                    <td>{{ $inscription->event->id }}</td>
                    <td>{{ $inscription->event->name }}</td>
                    <!-- <td>{{ $inscription->inscription_date }}</td> -->
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
