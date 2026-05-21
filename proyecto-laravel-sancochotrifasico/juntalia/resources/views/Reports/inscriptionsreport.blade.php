<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Inscripciones</title>
    <style>
        .top-user-box {
            border: 2px solid #007bff;
            border-radius: 8px;
            padding: 15px;
            background-color: #f8f9fa;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    @include('menu')

    <div class="container mt-5">
        <h1 class="text-center">Generar Reporte de Inscripciones</h1>
        
        <!-- Formulario para el reporte general 
        <form action="{{ route('generateReportinscriptions') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary mt-3">📄 Generar Reporte General</button>
        </form> -->

        <!-- Formulario para el reporte de inscripciones por usuario -->
        <div class="mt-4">
            <h2 class="mb-3">🔍 Generar Reporte por Usuario</h2>
            <form action="{{ route('generateUserInscriptionReport') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="user_id">Seleccione un usuario:</label>
                    <select class="form-control mb-2" id="user_id" name="user_id" required>
                        <option value="">-- Seleccione un usuario --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-secondary w-100">📄 Generar Reporte por Usuario</button>
            </form>
        </div>

        <!-- Usuario con más inscripciones -->
        @if(isset($topUser))
            <div class="top-user-box">
                <h2 class="text-primary">🏆 Usuario con más inscripciones</h2>
                <p><strong>👤 Nombre:</strong> {{ $topUser->name }}</p>
                <p><strong>📧 Email:</strong> {{ $topUser->email }}</p>
                <p><strong>📌 Cantidad de Inscripciones:</strong> {{ $topUser->inscriptions_count }}</p>
                <form action="{{ route('generateReportinscriptions') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success mt-2 w-100">📄 Generar Reporte del Top Usuario</button>
                </form>
            </div>
        @endif
    </div>

    @include('footer')
</body>
</html>


<!--<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Inscripciones</title>
</head>
<body>
    @include('menu')

    <div class="container mt-5">
        <h1>Generar Reporte de Inscripciones</h1>-->
        
        <!-- Formulario para el reporte general -->
         <!--
        <form action="{{ route('generateReportinscriptions') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary mt-3">Generar Reporte</button>
        </form>-->

        <!-- Formulario para el reporte de inscripciones por usuario -->
         <!--
        <h2 class="mt-4">Generar Reporte por Usuario</h2>
        <form action="{{ route('generateUserInscriptionReport') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="user_id">Seleccione un usuario:</label>
                <select class="form-control" id="user_id" name="user_id" required>
                    <option value="">-- Seleccione un usuario --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-secondary mt-3">Generar Reporte</button>
        </form>

        @if(isset($topUser))
            <h2 class="mt-4">Usuario con más inscripciones</h2>
            <p><strong>Nombre:</strong> {{ $topUser->name }}</p>
            <p><strong>Email:</strong> {{ $topUser->email }}</p>
            <p><strong>Cantidad de Inscripciones:</strong> {{ $topUser->inscriptions_count }}</p>
        @endif
    </div>

    @include('footer')
</body>
</html>-->