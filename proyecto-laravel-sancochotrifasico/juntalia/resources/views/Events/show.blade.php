@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>{{ $event->name }}</h2>
    <p><strong>Descripción:</strong> {{ $event->description }}</p>
    <p><strong>Fecha:</strong> {{ $event->date }}</p>
    <p><strong>Ubicación:</strong> {{ $event->location }}</p>
    <p><strong>Categoría:</strong> {{ $event->category->name }}</p>

    <a href="{{ route('events.byCategory', $event->category_id) }}" class="btn btn-secondary">Volver a la categoría</a>
</div>
@endsection