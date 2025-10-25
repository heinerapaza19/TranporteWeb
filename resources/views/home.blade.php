@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Bienvenido a tu panel de administración 🚀</p>
@stop

@section('css')
    {{-- Estilos personalizados --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("AdminLTE funcionando con Laravel 11 + Vite"); </script>
@stop
