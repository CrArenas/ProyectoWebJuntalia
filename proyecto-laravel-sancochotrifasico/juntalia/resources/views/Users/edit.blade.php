<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
@include('menu')
      <div class="container mt-5">
        <div class="caja_principal">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="rol_id" id="form-label-text">Seleccione un rol</label>
                    <select name="rol_id" id="select-form-control" class="form-control" required value="{{ $user->rol_id }}">
                        <option value="">Seleccionar</option>
                        @foreach ($rols as $rol)
                            <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                        @endforeach
                    </select>

                <label for="name" id="form-label-text" class="form-label">
                    Nombre
                </label>
                <input class="form-control" type="text" name="name" id="name" required value="{{ $user->name }}">

                <label for="last_name" id="form-label-text" class="form-label">
                    Apellido
                </label>
                <input class="form-control" type="text" name="last_name" id="last_name" required value="{{ $user->last_name }}">

                <label for="email" id="form-label-text" class="form-label">
                    Correo electrónico
                </label>
                <input class="form-control" type="email" name="email" id="email" required value="{{ $user->email }}">

                <label for="password" id="form-label-text" class="form-label">
                    Contraseña
                </label>
                <input class="form-control" type="password" name="password" id="password" required value="{{ $user->password }}">

                <label for="phone" id="form-label-text" class="form-label">
                    Teléfono
                </label>
                <input class="form-control" type="number" name="phone" id="phone" required value="{{ $user->phone }}">

                <label for="birth_date" id="form-label-text" class="form-label">
                    Fecha de nacimiento
                </label>
                <input class="form-control" type="date" name="birth_date" id="birth_date" required value="{{ $user->birth_date }}">

                <p></p>
                <button class="btn btn-success" type="submit">Guardar cambios de usuario</button>
            </form>
        </div> 
      </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@include('footer')
</body>
</html>