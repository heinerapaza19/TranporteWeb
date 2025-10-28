@extends('adminlte::page')

@section('title', 'Vehículos Registrados - Transporte San Román')

@section('content_header')
    <h1 class="text-success"><i class="fas fa-car"></i> Vehículos Disponibles por Empresa</h1>
@stop

@section('content')

{{-- 🔒 Solo mostrar esta vista a usuarios normales, no al administrador --}}
@php
    // Simulación de rol (luego puedes reemplazar por Auth::user()->role)
    $rolUsuario = 'usuario'; // Cambiar a 'admin' para probar el bloqueo
@endphp

@if ($rolUsuario != 'admin')

<div class="card card-success elevation-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title"><i class="fas fa-bus"></i> Lista de Vehículos</h3>
        <span class="text-white-50">Consulta pública - Solo usuarios</span>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Placa</th>
                    <th>Modelo</th>
                    <th>Color</th>
                    <th>Capacidad</th>
                    <th>Chofer</th>
                    <th>Empresa</th>
                    <th>Revisión Técnica</th>
                    <th>SOAT</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>X0R-325</td>
                    <td>Hyundai County</td>
                    <td>Blanco</td>
                    <td>30</td>
                    <td>Juan Mamani</td>
                    <td><span class="badge bg-primary">Empresa San Román</span></td>
                    <td><span class="badge bg-success">Vigente</span></td>
                    <td><span class="badge bg-success">Vigente</span></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Z2B-458</td>
                    <td>Toyota Coaster</td>
                    <td>Azul</td>
                    <td>28</td>
                    <td>Carlos Quispe</td>
                    <td><span class="badge bg-info text-dark">Empresa Los Andes</span></td>
                    <td><span class="badge bg-danger">Vencida</span></td>
                    <td><span class="badge bg-warning text-dark">Por vencer</span></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>V3G-987</td>
                    <td>Mercedes Sprinter</td>
                    <td>Verde</td>
                    <td>25</td>
                    <td>Marcos Flores</td>
                    <td><span class="badge bg-warning text-dark">Empresa Santa Cruz</span></td>
                    <td><span class="badge bg-success">Vigente</span></td>
                    <td><span class="badge bg-success">Vigente</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@else
    <div class="alert alert-danger text-center">
        <h5><i class="fas fa-ban"></i> Acceso restringido</h5>
        <p>El módulo de vehículos solo está disponible para usuarios. El administrador no puede visualizarlo.</p>
    </div>
@endif

@stop
