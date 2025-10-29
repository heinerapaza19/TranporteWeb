@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('title', 'Login Chofer')

@section('auth_body')
    <form action="{{ route('chofer.login.post') }}" method="POST">
        @csrf

        <div class="form-group mb-3 text-center">
            <p class="text-white-50 mb-1">🚍 Bienvenido a tu empresa como chofer</p>
            <select name="empresa_id" class="form-control" required>
                <option value="">Selecciona tu empresa</option>
                @foreach ($empresas as $empresa)
                    <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                @endforeach
            </select>
        </div>


        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Correo" required autofocus>
            <div class="input-group-append">
                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
            </div>
        </div>

        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
            <div class="input-group-append">
                <div class="input-group-text"><span class="fas fa-lock"></span></div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block">
            <i class="fas fa-sign-in-alt"></i> Iniciar sesión
        </button>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                {{ $errors->first() }}
            </div>
        @endif
    </form>
@endsection
