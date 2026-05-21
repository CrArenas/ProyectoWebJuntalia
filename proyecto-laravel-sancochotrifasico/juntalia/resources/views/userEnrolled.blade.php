@include('menu')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Inscripciones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .content-wrapper {
            min-height: 80vh; 
            overflow: hidden; 
            padding-bottom: 50px; 
        }
        .card {
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .card-title {
            font-weight: bold;
            color: #343a40;
        }
        .card-text {
            font-size: 14px;
            color: #6c757d;
        }
    </style>
</head>
<body>

<div class="container mt-5 content-wrapper">
    <h1 class="testimonial_taital">Mis Inscripciones</h1>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    <div class="row">
        @forelse($inscriptions as $inscription)
            <div class="col-md-4">
                <div class="card shadow-sm">
                        <div class="card-body text-center">
                        <h5 class="card-title">{{ $inscription->event->name }}</h5>
                        <p class="card-text">{{ Str::limit($inscription->event->description, 80) }}</p>
                        <p><strong>📅 Fecha:</strong> {{ date('d/m/Y H:i', strtotime($inscription->event->event_date_time)) }}</p>
                        <p><strong>📍 Ciudad:</strong> {{ $inscription->event->city->name }}</p>
                        <p><strong>📌 Dirección:</strong> {{$inscription->event->address }}</p>
                        <p class="fw-bold text-success">{{ ucfirst($inscription->event->status) }}</p>
                        <form action="{{ route('inscriptions.cancel', $inscription->event->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Anular inscripción</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center text-muted">No estás inscrito en ningún evento. ¡Encuentra uno interesante y regístrate!</p>
            </div>
        @endforelse
    </div>
</div>

<div class="mascota-container">
    <img src="{{ asset('assets/images/Mascota-Feliz.jpeg') }}" alt="Mascota" class="mascota-imagen">
    <div class="burbuja-texto">
        <span style="font-weight: bold;">Junior: </span>
        ¡Bienvenido a tu panel de inscripciones! Acá podrás ver los eventos en los que te has inscrito.😼🎉
        Además, podrás cancelar tu inscripción si así lo deseas.🚫 
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@include('footer')
