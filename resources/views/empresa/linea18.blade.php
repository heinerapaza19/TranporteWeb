@extends('adminlte::page')

@section('title', 'Empresa de Transporte Línea 18')

@section('content_header')
    <h1 class="text-danger">
        <i class="fas fa-users"></i> Empresa de Transporte Línea 18
    </h1>
@stop

@section('content')
    <div class="card bg-dark text-white elevation-4">
        <div class="card-header border-0" style="background: linear-gradient(135deg, #e53935, #ff6f60);">
            <h3 class="card-title text-white fw-bold">
                <i class="fas fa-building"></i> Información General de la Empresa
            </h3>
        </div>

        <div class="card-body">
            <div class="row align-items-center">
                <!-- Logo -->
                <div class="col-md-3 text-center">
                    <img src="{{ asset('logos/18.jpg') }}" alt="Logo Empresa Línea 18"
                        class="img-fluid rounded-circle border border-light p-2 shadow"
                        style="width: 150px; height: 150px; object-fit: cover;">
                </div>

                <!-- Datos -->
                <div class="col-md-9">
                    <h3 class="text-danger fw-bold mb-3">Empresa de Transporte Línea 18</h3>
                    <p><strong>Zona de cobertura:</strong> Zona Sur - Juliaca</p>
                    <p><strong>N° de micros:</strong> 6</p>
                    <p><strong>Choferes activos:</strong> 5</p>
                    <p><strong>Rutas activas:</strong> 4</p>
                    <p><strong>Teléfono:</strong> 951000118</p>
                    <p><strong>Dirección:</strong> Jr. Moquegua N° 512</p>
                    <p><strong>Correo:</strong> linea18@transporte.com</p>
                    <p><strong>Estado:</strong> <span class="badge bg-success">Operativo</span></p>
                </div>
            </div>

            <hr class="bg-light">

            <div class="row text-center mt-4">
                <!-- Ver Rutas -->
                <div class="col-md-3 mb-3">
                    <div class="card bg-danger text-white shadow-sm border-0">
                        <div class="card-body">
                            <i class="fas fa-route fa-2x mb-2"></i>
                            <h5>Ver Rutas</h5>
                            <a href="{{ url('/mapa/18') }}" class="btn btn-light btn-sm rounded-pill fw-bold">
                                <i class="fas fa-map-marked-alt"></i> Mapa
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Choferes -->
                <div class="col-md-3 mb-3">
                    <div class="card bg-danger text-white shadow-sm border-0">
                        <div class="card-body">
                            <i class="fas fa-user-friends fa-2x mb-2"></i>
                            <h5>Choferes</h5>
                            <a href="{{ url('/choferes/18') }}" class="btn btn-light btn-sm rounded-pill fw-bold">
                                <i class="fas fa-id-card"></i> Ver
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Horarios -->
                <div class="col-md-3 mb-3">
                    <div class="card bg-danger text-white shadow-sm border-0">
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
                    <div class="card bg-danger text-white shadow-sm border-0">
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

            <div class="text-center mt-4">
                <a href="{{ url('/') }}" class="btn btn-outline-light rounded-pill px-4">
                    <i class="fas fa-arrow-left"></i> Volver al panel
                </a>
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

        .btn-light {
            color: #e53935 !important;
        }

        .btn-light:hover {
            background-color: #fff !important;
            color: #b71c1c !important;
        }
    </style>
@stop
