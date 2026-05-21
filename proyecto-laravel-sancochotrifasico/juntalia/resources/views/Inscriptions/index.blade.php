<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @include('menu')
    <div class="fondo-inscripciones">
    <div class="container mt-5">
        <!-- Formulario de inscripción -->
        <div class="card shadow p-4 mb-4">
            <h2 class="text-center">Registrar Inscripción</h2>
            <form action="{{ route('inscriptions.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="user_id" class="form-label">Seleccione un Usuario</label>
                    <select name="user_id" class="form-control" required>
                        <option value="">Seleccione</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} {{ $user->last_name }} - - - - {{ $user->name }} {{ $user->email }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="event_id" class="form-label">Seleccione un Evento</label>
                    <select name="event_id" class="form-control" required>
                        <option value="">Seleccione</option>
                        @foreach ($events as $event)
                            <option value="{{ $event->id }}">{{ $event->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Inscribirse</button>
                </div>
            </form>
        </div>

        <!-- Lista de Inscripciones -->
        <div class="card shadow p-4">
            <h2 class="text-center">Lista de Inscripciones</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-secondary">
                            <th>ID del usuario</th>
                            <th>Nombre del usuario</th>
                            <th>Email del usuario</th>
                            <th>ID del evento</th>
                            <th>Nombre del evento</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inscriptions as $inscription)
                            <tr class="table-light">
                                <td>{{ $inscription->user_id }}</td>
                                <td>{{ $inscription->user->name }} {{ $inscription->user->last_name }}</td>
                                <td>{{ $inscription->user->email }} </td>
                                <td>{{ $inscription->event_id }}</td>
                                <td>{{ $inscription->event->name }}</td>
                                <td>
                                    <form action="{{ route('inscriptions.destroy', $inscription->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    </form>
                                    <!-- <a class="btn btn-warning btn-sm" href="{{ route('inscriptions.edit', $inscription->id) }}" role="button">Editar</a> -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @include('footer')
</body>
</html>
