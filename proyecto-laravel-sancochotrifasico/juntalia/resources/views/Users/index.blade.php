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
            <form action="{{ route('users.store') }}" method="post">
                @csrf

                <label for="name" id="form-label-text" class="form-label">
                    Nombre
                </label>
                <input class="form-control" type="text" name="name" id="name" required>

                <label for="last_name" id="form-label-text" class="form-label">
                    Apellido
                </label>
                <input class="form-control" type="text" name="last_name" id="last_name" required>

                <label for="email" id="form-label-text" class="form-label">
                    Correo electrónico
                </label>
                <input class="form-control" type="email" name="email" id="email" required>

                <label for="password" id="form-label-text" class="form-label">
                    Contraseña
                </label>
                <input class="form-control" type="password" name="password" id="password" required>

                <label for="phone" id="form-label-text" class="form-label">
                    Teléfono
                </label>
                <input class="form-control" type="number" name="phone" id="phone" required>

                <label for="birth_date" id="form-label-text" class="form-label">
                    Fecha de nacimiento
                </label>
                <input class="form-control" type="date" name="birth_date" id="birth_date" required>

                <p></p>
                <button class="btn btn-success" type="submit">Guardar Usuario</button>
            </form>
        </div> 

        <p></p>
    <h1> Lista de usuarios</h1>
    <div class="d-flex justify-content-center">
  
            <table class="table table-bordered" id="tabla">
                <thead>
                    <tr class="table-secondary">
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo electrónico</th>
                        <th>Teléfono</th>
                        <th>Fecha de cumpleaños</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="table-light">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->birth_date }}</td>
                            <td>
                                 <a class="btn btn-warning" href="{{ route('users.edit', $user->id) }}" role="button">Editar</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display: inline-block;">
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