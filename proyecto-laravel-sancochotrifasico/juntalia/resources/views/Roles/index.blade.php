<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Roles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
@include('menu')
      <div class="container mt-5">
        <div class="caja_principal">
            <form action="{{ route('roles.store') }}" method="post">
                @csrf
                <label for="name" id="form-label-text" class="form-label">
                    Nombre
                </label>
                <input class="form-control" type="text" name="name_Rol" id="name" required>
                <p></p>
                <button class="btn btn-success" type="submit">Guardar Rol</button>
            </form>
        </div> 
        <p></p>
        <h1> Lista de Roles</h1>
    <div class="d-flex justify-content-center">
    
            <table class="table table-bordered" id="tabla">
                <thead>
                    <tr class="table-secondary">
                        <th>Nombre</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $rol)
                        <tr class="table-light">
                            <td>{{ $rol->name }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('roles.edit', $rol->id) }}" role="button">Editar</a>
                                <form action="{{ route('roles.destroy', $rol->id) }}" method="post" style="display: inline-block;">
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