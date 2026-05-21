@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="chart-container p-4 bg-white shadow-lg rounded">
                <h2 class="text-center text-primary">📊 Eventos por Categoría</h2>
                <p class="text-center text-muted">
                    Cantidad de eventos organizados por cada categoría.
                </p>
                <div id="eventsChart" style="width:100%; height:500px;"></div>
                <div class="text-center mt-4">
                    <a href="{{ route('reports.index') }}" class="btn btn-outline-primary">🔙 Volver a Reportes</a>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.plot.ly/plotly-2.27.0.min.js"></script>
<script src="{{ asset('assets/js/charts.js') }}"></script>
@endsection
