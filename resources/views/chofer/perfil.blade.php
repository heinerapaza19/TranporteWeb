@extends('adminlte::page')

@section('title', 'Perfil del Chofer')

@section('content_header')
    <h1 class="text-primary"><i class="fas fa-user"></i> Mi Perfil</h1>
@stop

@section('content')
<div class="card shadow-lg border-0">
    <div class="card-body">
        <div class="row">
            {{-- 🧍 Información personal --}}
            <div class="col-md-4 text-center border-end">
                <i class="fas fa-user-circle fa-8x text-secondary mb-3"></i>
                <h4 class="text-primary">{{ $chofer->nombres }} {{ $chofer->apellidos }}</h4>
                <p class="text-muted">{{ $chofer->email }}</p>

                <p><strong>DNI:</strong> {{ $chofer->dni }}</p>
                <p><strong>Licencia:</strong> {{ $chofer->licencia }}</p>
                <p><strong>Teléfono:</strong> {{ $chofer->telefono }}</p>
                <p><strong>Ruta Asignada:</strong> {{ $chofer->ruta_asignada }}</p>

                {{-- 📍 Botón para ir a su mapa de ruta --}}
                @php
                    $empresa = strtolower($chofer->empresa->nombre ?? '');
                    $rutaChofer = null;

                    if (str_contains($empresa, '18')) {
                        $rutaChofer = route('mapa.linea18');
                    } elseif (str_contains($empresa, '22')) {
                        $rutaChofer = route('mapa.22');
                    } elseif (str_contains($empresa, '55')) {
                        $rutaChofer = route('mapa.55');
                    } elseif (str_contains($empresa, 'naranja') || str_contains($empresa, 'román')) {
                        $rutaChofer = route('mapa.naranja');
                    }
                @endphp

                @if ($rutaChofer)
                    <a href="{{ $rutaChofer }}" class="btn btn-primary btn-block mt-3">
                        <i class="fas fa-route"></i> Ver mi ruta
                    </a>
                @else
                    <p class="text-danger mt-3">No tienes una ruta asignada.</p>
                @endif
            </div>

            {{-- 🚐 Información del vehículo --}}
            <div class="col-md-8">
                <h5 class="text-primary mb-3"><i class="fas fa-bus"></i> Vehículo Asignado</h5>

                @if($chofer->vehiculo)
                    <table class="table table-bordered text-center">
                        <tr>
                            <th>Placa</th>
                            <td>{{ $chofer->vehiculo->placa }}</td>
                        </tr>
                        <tr>
                            <th>Modelo</th>
                            <td>{{ $chofer->vehiculo->modelo }}</td>
                        </tr>
                        <tr>
                            <th>Color</th>
                            <td>{{ $chofer->vehiculo->color }}</td>
                        </tr>
                        <tr>
                            <th>Capacidad</th>
                            <td>{{ $chofer->vehiculo->capacidad }} pasajeros</td>
                        </tr>
                        <tr>
                            <th>Revisión Técnica</th>
                            <td>
                                <span class="badge 
                                    @if ($chofer->vehiculo->revision_tecnica == 'Vigente') bg-success
                                    @elseif ($chofer->vehiculo->revision_tecnica == 'Por vencer') bg-warning text-dark
                                    @else bg-danger @endif">
                                    {{ $chofer->vehiculo->revision_tecnica }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>SOAT</th>
                            <td>
                                <span class="badge 
                                    @if ($chofer->vehiculo->soat == 'Vigente') bg-success
                                    @elseif ($chofer->vehiculo->soat == 'Por vencer') bg-warning text-dark
                                    @else bg-danger @endif">
                                    {{ $chofer->vehiculo->soat }}
                                </span>
                            </td>
                        </tr>
                    </table>
                @else
                    <div class="alert alert-warning mt-3">
                        🚫 No tienes vehículo asignado aún.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@stop
