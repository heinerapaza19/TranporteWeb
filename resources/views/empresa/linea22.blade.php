@extends('adminlte::page')

@section('title', 'Empresa de Transporte Línea 22')

@section('content_header')
    <h1 class="text-info">
        <i class="fas fa-bus"></i> Empresa de Transporte Línea 22
    </h1>
@stop

@section('content')
    <div class="card bg-dark text-white elevation-4">
        <div class="card-header border-0" style="background: linear-gradient(135deg, #26a69a, #00bcd4);">
            <h3 class="card-title text-white fw-bold">
                <i class="fas fa-building"></i> Información General de la Empresa
            </h3>
        </div>

        <div class="card-body">
            <div class="row align-items-center">
                <!-- Logo -->
                <div class="col-md-3 text-center">
                    <img src="{{ asset('logos/22.jpg') }}" alt="Logo Empresa Línea 22"
                        class="img-fluid rounded-circle border border-light p-2 shadow"
                        style="width: 150px; height: 150px; object-fit: cover;">
                </div>

                <!-- Datos -->
                <div class="col-md-9">
                    <h3 class="text-info fw-bold mb-3">Empresa de Transporte Línea 22</h3>
                    <p><strong>Zona de cobertura:</strong> Zona Centro - Juliaca</p>
                    <p><strong>N° de micros:</strong> 10</p>
                    <p><strong>Choferes activos:</strong> 9</p>
                    <p><strong>Rutas activas:</strong> 5</p>
                    <p><strong>Teléfono:</strong> 951000222</p>
                    <p><strong>Dirección:</strong> Av. Huancané</p>
                    <p><strong>Correo:</strong> linea22@transporte.com</p>
                    <p><strong>Estado:</strong> <span class="badge bg-success">Operativo</span></p>
                </div>
            </div>

            <hr class="bg-light">

            <div class="row text-center mt-4">
                <!-- Ver Rutas -->
                <div class="col-md-3 mb-3">
                    <div class="card bg-info text-white shadow-sm border-0">
                        <div class="card-body">
                            <i class="fas fa-route fa-2x mb-2"></i>
                            <h5>Ver Rutas</h5>
                            <a href="{{ url('/mapa/22') }}" class="btn btn-light btn-sm rounded-pill fw-bold">
                                <i class="fas fa-map-marked-alt"></i> Mapa
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Choferes -->
                <div class="col-md-3 mb-3">
                    <div class="card bg-info text-white shadow-sm border-0">
                        <div class="card-body">
                            <i class="fas fa-user-friends fa-2x mb-2"></i>
                            <h5>Choferes</h5>
                            <a href="{{ url('/choferes/22') }}" class="btn btn-light btn-sm rounded-pill fw-bold">
                                <i class="fas fa-id-card"></i> Ver
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Horarios -->
                <div class="col-md-3 mb-3">
                    <div class="card bg-info text-white shadow-sm border-0">
                        <div class="card-body">
                            <i class="fas fa-clock fa-2x mb-2"></i>
                            <h5>Horarios</h5>
                            <a href="#" class="btn btn-light btn-sm rounded-pill fw-bold">
                                <i class="fas fa-calendar-alt"></i> Ver
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Configuraciones -->
                <div class="col-md-3 mb-3">
                    <div class="card bg-info text-white shadow-sm border-0">
                        <div class="card-body">
                            <i class="fas fa-cogs fa-2x mb-2"></i>
                            <h5>Configuraciones</h5>
                            <a href="#" class="btn btn-light btn-sm rounded-pill fw-bold">
                                <i class="fas fa-tools"></i> Ajustes
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        body {
            background-color: #2a2a2a !important;
        }

        .card {
            border-radius: 15px;
        }

        .card-body p {
            font-size: 1rem;
        }
    </style>
@stop
