@include('menu')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }}</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">{{ $category->name }}</h1>

    @if($events->isEmpty())
        <p class="text-center">No hay eventos en esta categoría.</p>
    @else
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach($events as $event)
                <div class="col">
                    <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->name }}</h5>
                            <p class="card-text">{{ $event->description }}</p>
                            <p><strong>Fecha:</strong> {{ $event->event_date_time }}</p>
                            <p><strong>Ciudad:</strong> {{ $event->city->name }}</p>
                            <p><strong>Dirección:</strong> {{ $event->address }}</p>
                            <p><strong>Estado:</strong> {{ $event->status }}</p>
                            <div class="d-flex justify-content-between">
                            <a href="{{ route('events.details', $event->id) }}" class="btn btn-primary">Ver mas</a>    
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
</body>
</html>

@include('footer')