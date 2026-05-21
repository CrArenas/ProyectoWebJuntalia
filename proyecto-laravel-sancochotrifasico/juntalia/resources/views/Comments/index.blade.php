<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @include('menu')
    <div class="container mt-5">
        <div class="caja_principal">
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <label for="user_id" id="form-label-text">Seleccione un Usuario</label>
                <select name="user_id" id="select-form-control" class="form-control" required>
                    <option value="">Seleccione</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->id }}</option>
                    @endforeach
                </select>
                <label for="event_id" id="form-label-text">Seleccione un evento</label>
                <select name="event_id" id="select-form-control" class="form-control" required>
                    <option value="">Seleccione</option>
                    @foreach ($events as $event)
                        <option value="{{ $event->id }}">{{ $event->name }}</option>
                    @endforeach
                </select>
                <label for="content" class="form-label" id="form-label-text">Comentario</label>
                <input class="form-control" type="text" name="comment" id="comment" required>
                <p></p>
                <button type="submit" class="btn btn-success">Comentar</button>
            </form>
        </div>
        <p></p>
        <h1>Comentarios</h1>
        <div class="d-flex justify-content-center">
            <table class="table table-bordered" id="tabla">
                <thead>
                    <tr class="table-secondary">
                        <th>Comentario</th>
                        <th>ID Usuario</th>
                        <th>ID Evento</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                        <tr class="table-light">
                            <td>{{ $comment->comment }}</td>
                            <td>{{ $comment->user_id }}</td>
                            <td>{{ $comment->event_id }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('comments.edit', $comment->id) }}" role="button">Editar</a>
                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                    
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @include('footer')
</body>
</html>
