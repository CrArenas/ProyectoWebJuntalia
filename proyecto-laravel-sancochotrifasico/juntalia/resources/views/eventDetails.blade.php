@include('menu')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->name }}</title>
</head>
<body>
<div class="fondo-panel-eventos py-5">
    <div class="container">
        <div class="card shadow-lg p-4 mx-auto" style="max-width: 800px;">
            <h2 class="testimonial_taital">{{ $event->name }}</h2>
            <p class="text-muted">Publicado hace: {{ $event->created_at ? $event->created_at->diffForHumans() : 'Fecha no disponible' }}</p>

            <p class="mt-3"><strong>Descripción:</strong> {{ $event->description }}</p>
            <p><strong>Fecha:</strong> {{ $event->event_date_time }}</p>
            <p><strong>Restricción de edad:</strong> {{ $event->age_restriction }}</p>
            <p><strong>Costo:</strong> {{ $event->cost }}</p>
            <p><strong>Estado:</strong> {{ $event->status }}</p>
            <p><strong>Mascotas:</strong> {{ $event->pets }}</p>
            <p><strong>Ubicación:</strong> {{ $event->city->name }}</p>
            <p><strong>Dirección:</strong> {{ $event->address }}</p>
            <p><strong>Categoría:</strong> {{ $event->category->name }}</p>
            <form action="{{ route('inscriptions.store') }}" method="POST">
                @csrf
                <input type="hidden" name="event_id" value="{{ $event->id }}">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <button type="submit" class="btn btn-success w-100 mt-3">Inscribirse</button>
            </form>
        </div>

        <div class="card shadow-lg p-4 mx-auto mt-4" style="max-width: 800px;">
            <h3 class="text-secondary">Comentarios</h3>
        
            <form action="{{ route('comments.store') }}" method="POST" class="mb-4">
                @csrf
                <input type="hidden" name="event_id" value="{{ $event->id }}">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <div class="mb-3">
                    <textarea name="comment" class="form-control" rows="3" placeholder="Escribe un comentario..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Publicar comentario</button>
            </form>

            <div>
                @forelse ($event->comments as $comment)
                    <div class="mb-3 p-2 border-bottom">
                        <strong>{{ $comment->user->name }}</strong> 
                        <span class="text-muted">• {{ $comment->created_at ? $comment->created_at->diffForHumans() : 'Fecha no disponible' }}</span>
                        <p class="mb-0">{{ $comment->comment }}</p>
                    </div>
                @empty
                    <p class="text-muted">No hay comentarios aún. Sé el primero en comentar.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

<div class="mascota-container">
    <img src="{{asset('assets/images/Mascota-Feliz.jpeg')}}" alt="Mascota" class="mascota-imagen">
    <div class="burbuja-texto">
        <span style="font-weight: bold;">Junior: </span>
        ¡Holaa! Acá en este panel podrás inscribirte al evento que estás consultando, de paso también podrás ver qué comentarios
        hay acerca del evento. Por favor, no comentes groserías. 😿​😿​
    </div>
</div>

@include('footer')
</body>
</html>

