<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciudades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @include('menu')
    <div class="fondo-ciudades">
    <div class="container mt-5">
        <div class="card shadow p-4 mb-4">
            <h2 class="text-center">Registrar Ciudad</h2>
            <form action="{{ route('cities.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre de la Ciudad</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Guardar Ciudad</button>
                </div>
            </form>
        </div>

        <div class="card shadow p-4">
            <h2 class="text-center">Lista de Ciudades</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-secondary">
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cities as $city)
                            <tr class="table-light">
                                <td>{{ $city->name }}</td>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="{{ route('cities.edit', $city->id) }}" role="button">Editar</a>
                                    <form action="{{ route('cities.destroy', $city->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    </form>
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
