@extends('adminlte::page')

@section('title', 'Micros Registrados')

@section('content_header')
    <h1 class="text-primary"><i class="fas fa-bus"></i> Lista de Micros</h1>
@stop

@section('content')
    <div class="card shadow-lg border-0" style="background-color:#454D55; color:#fff;">
        <div class="card-header bg-gradient-primary d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0 text-white">
                <i class="fas fa-list"></i> Micros Registrados
            </h3>
            
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dark table-striped table-hover text-center align-middle mb-0">
                    <thead style="background-color: #007bff;">
                        <tr>
                            <th>#</th>
                            <th>Placa</th>
                            <th>Modelo</th>
                            <th>Color</th>
                            <th>Chofer</th>
                            <th>Empresa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($micros as $micro)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $micro->placa }}</td>
                                <td>{{ $micro->modelo }}</td>
                                <td>
                                    <span class="badge bg-secondary">{{ $micro->color }}</span>
                                </td>
                                <td>
                                    @if ($micro->chofer)
                                        <span class="text-while fw-bold">
                                            {{ $micro->chofer->nombres }} {{ $micro->chofer->apellidos }}
                                        </span>
                                    @else
                                        <span class="text-warning">Sin chofer</span>
                                    @endif
                                </td>
                                <td>{{ $micro->empresa->nombre ?? 'Sin empresa' }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer text-center text-white-50">
            <small><i class="fas fa-info-circle"></i> Datos actualizados al {{ now()->format('d/m/Y') }}</small>
        </div>
    </div>
@stop

@section('css')
    <style>
        body {
            background-color: #2a2a2a !important;
        }

        table th,
        table td {
            vertical-align: middle !important;
        }

        .table-dark th {
            border-color: #3a3a3a;
        }

        .table-dark td {
            border-color: #3a3a3a;
        }

        .table-dark tr:hover {
            background-color: #3c3c3c;
            transition: 0.2s ease;
        }

        .badge {
            font-size: 0.85rem;
            padding: 6px 10px;
        }

        .card-footer {
            background: rgba(255, 255, 255, 0.05);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
@stop
