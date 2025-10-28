@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('auth_header')
    <h3>Acceso Empresa 
        @if($empresaPreseleccionada)
            <strong class="text-info">{{ $empresaPreseleccionada->nombre }}</strong>
        @endif
    </h3>
@endsection

@section('auth_body')
    <form action="{{ route('empresa.login.post') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Correo de empresa</label>
            <input type="email" name="correo_login" class="form-control" placeholder="empresa@correo.com" required>
        </div>

        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" name="password_login" class="form-control" placeholder="********" required>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger mt-2">
                {{ $errors->first('correo_login') }}
            </div>
        @endif

        <button type="submit" class="btn btn-primary btn-block">
            <i class="fas fa-sign-in-alt"></i> Ingresar
        </button>
    </form>
@endsection
