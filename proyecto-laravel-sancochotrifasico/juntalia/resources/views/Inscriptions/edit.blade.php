<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Inscripcion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
@include('menu')
    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-center">
            <form action="{{ route('inscriptions.update', $inscription->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <label for="user_id" class="form-label">Seleccione un Usuario</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    <option value="">Seleccione</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $inscription->user_id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                
                <label for="event_id" class="form-label">Seleccione un Evento</label>
                <select name="event_id" id="event_id" class="form-control" required>
                    <option value="">Seleccione</option>
                    @foreach ($events as $event)
                        <option value="{{ $event->id }}" {{ $event->id == $inscription->event_id ? 'selected' : '' }}>
                            {{ $event->name }}
                        </option>
                    @endforeach
                </select>
                
                <label for="content" class="form-label">Inscripcion</label>
                <textarea class="form-control" name="content" id="content" required>{{ $inscription->event_id }}</textarea>
                
                <p></p>
                <button class="btn btn-success" type="submit">Guardar cambios</button>
            </form>
        </div> 
      </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@include('footer')
</body>
</html>
-->