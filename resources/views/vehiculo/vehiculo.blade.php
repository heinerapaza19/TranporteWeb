@extends('adminlte::page')

@section('title', 'Micros Registrados')

@section('content_header')
    <h1 class="text-primary"><i class="fas fa-bus"></i> Lista de Micros</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-striped text-center">
            <thead class="bg-primary text-white">
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
                @foreach($micros as $micro)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $micro->placa }}</td>
                        <td>{{ $micro->modelo }}</td>
                        <td>{{ $micro->color }}</td>
                        <td>{{ $micro->chofer->nombres ?? 'Sin chofer' }}</td>
                        <td>{{ $micro->empresa->nombre ?? 'Sin empresa' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
