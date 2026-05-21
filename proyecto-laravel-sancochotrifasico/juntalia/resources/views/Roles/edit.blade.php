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
    <div class="row">
      <div class="col-12">
        <div class="caja_principal">
            <form action="{{ route('roles.update', $rol->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="name" id="form-label-text" class="form-label">
                    Nombre
                </label>
                <input class="form-control" type="text" name="name_Rol" id="name" required value="{{ $rol->name }}">

                <p></p>
                <button class="btn btn-success" type="submit">Guardar cambios del rol</button>
            </form>
        </div> 
      </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@include('footer')
</body>
</html>