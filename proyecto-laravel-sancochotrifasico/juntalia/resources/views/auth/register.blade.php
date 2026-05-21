<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Registro de usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('menu')

<div class="register-container">
    <div class="form-container">
        <div class="form-box">
            <h2 class="text-center">Registro de Usuario</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf

                <label for="name" class="form-label">Nombre</label>
                <input class="form-control" type="text" name="name" id="name" required>

                <label for="last_name" class="form-label">Apellido</label>
                <input class="form-control" type="text" name="last_name" id="last_name" required>

                <label for="email" class="form-label">Correo electrónico</label>
                <input class="form-control" type="email" name="email" id="email" required>

                <label for="phone" class="form-label">Teléfono</label>
                <input class="form-control" type="text" name="phone" id="phone" required>

                <label for="phone" class="form-label">Confirmar teléfono</label>
                <input class="form-control" type="text" name="phone_confirmation" id="phone" required>

                <label for="birth_date" class="form-label">Fecha de nacimiento</label>
                <input class="form-control" type="date" name="birth_date" id="birth_date" required>

                <label for="password" class="form-label">Contraseña</label>
                <input class="form-control" type="password" name="password" id="password" required>

                <label for="password" class="form-label">Confirmar contraseña</label>
                <input class="form-control" type="password" name="password_confirmation" placeholder="Confirma la contraseña" required>

                <p></p>
                <button class="btn btn-success w-100" type="submit">Registrarse</button>
            </form>
        </div>
    </div>

    <div class="image-container"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/validation.js') }}"></script>

@include('footer')
</body>
</html>
