@extends('adminlte::page')

@section('title', 'Panel - ' . $empresa->nombre)

@section('content_header')
    <h1 class="text-primary">
        <img src="{{ asset($empresa->logo) }}" width="45" class="mr-2 rounded">
        <i class="fas fa-bus"></i> Panel de la Empresa - {{ $empresa->nombre }}
    </h1>
@stop

@section('content')

    {{-- Mensajes de éxito/error --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <!-- Tarjetas resumen -->
        <div class="col-lg-3 col-6">
            <div class="info-box bg-gradient-info elevation-4">
                <span class="info-box-icon"><i class="fas fa-route"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Rutas activas</span>
                    <span class="info-box-number">8</span>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="info-box bg-gradient-warning elevation-4">
                <span class="info-box-icon"><i class="fas fa-id-badge"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Choferes registrados</span>
                    <span class="info-box-number">{{ $empresa->choferes->count() }}</span>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="info-box bg-gradient-success elevation-4">
                <span class="info-box-icon"><i class="fas fa-bus"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Vehículos registrados</span>
                    <span class="info-box-number">{{ $empresa->vehiculos->count() }}</span>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="info-box bg-gradient-danger elevation-4">
                <span class="info-box-icon"><i class="fas fa-chart-bar"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Reportes pendientes</span>
                    <span class="info-box-number">3</span>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <!-- 🧾 Gestión de Choferes -->
    <div class="card card-warning elevation-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title"><i class="fas fa-id-badge"></i> Gestión de Choferes</h3>
            <button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#modalAddChofer">
                <i class="fas fa-plus-circle"></i> Nuevo Chofer
            </button>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Teléfono</th>
                        <th>Ruta</th>
                        <th>Licencia</th>
                        <th>Educación Vial</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empresa->choferes as $i => $chofer)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $chofer->nombres }} {{ $chofer->apellidos }}</td>
                            <td>{{ $chofer->dni }}</td>
                            <td>{{ $chofer->telefono }}</td>
                            <td>{{ $chofer->ruta_asignada }}</td>
                            <td>
                                <span class="badge bg-{{ $chofer->estado_licencia == 'Activa' ? 'success' : 'danger' }}">
                                    {{ $chofer->estado_licencia }}
                                </span>
                            </td>
                            <td>
                                <span
                                    class="badge
                                @if ($chofer->educacion_vial == 'Aprobado') bg-success
                                @elseif ($chofer->educacion_vial == 'Pendiente') bg-warning text-dark
                                @else bg-danger @endif">
                                    {{ $chofer->educacion_vial }}
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#modalEditChofer{{ $chofer->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('chofer.destroy', $chofer->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('¿Estás seguro de eliminar a {{ $chofer->nombres }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        {{-- Modal editar chofer {{ $chofer->id }} --}}
                        <div class="modal fade" id="modalEditChofer{{ $chofer->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning text-white">
                                        <h5 class="modal-title"><i class="fas fa-edit"></i> Editar Chofer</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('chofer.update', $chofer->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="empresa_id" value="{{ $empresa->id }}">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nombres</label>
                                                    <input type="text" name="nombres" class="form-control"
                                                        value="{{ $chofer->nombres }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Apellidos</label>
                                                    <input type="text" name="apellidos" class="form-control"
                                                        value="{{ $chofer->apellidos }}" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>DNI</label>
                                                    <input type="text" name="dni" maxlength="8"
                                                        class="form-control" value="{{ $chofer->dni }}" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Teléfono</label>
                                                    <input type="text" name="telefono" maxlength="9"
                                                        class="form-control" value="{{ $chofer->telefono }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Licencia</label>
                                                    <input type="text" name="licencia" class="form-control"
                                                        value="{{ $chofer->licencia }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Ruta Asignada</label>
                                                    <input type="text" name="ruta_asignada" class="form-control"
                                                        value="{{ $chofer->ruta_asignada }}">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Estado Licencia</label>
                                                    <select name="estado_licencia" class="form-control">
                                                        <option value="Activa"
                                                            {{ $chofer->estado_licencia == 'Activa' ? 'selected' : '' }}>
                                                            Activa</option>
                                                        <option value="Inactiva"
                                                            {{ $chofer->estado_licencia == 'Inactiva' ? 'selected' : '' }}>
                                                            Inactiva</option>
                                                        <option value="Pendiente"
                                                            {{ $chofer->estado_licencia == 'Pendiente' ? 'selected' : '' }}>
                                                            Pendiente</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Educación Vial</label>
                                                    <select name="educacion_vial" class="form-control">
                                                        <option value="Aprobado"
                                                            {{ $chofer->educacion_vial == 'Aprobado' ? 'selected' : '' }}>
                                                            Aprobado</option>
                                                        <option value="Pendiente"
                                                            {{ $chofer->educacion_vial == 'Pendiente' ? 'selected' : '' }}>
                                                            Pendiente</option>
                                                        <option value="Reprobado"
                                                            {{ $chofer->educacion_vial == 'Reprobado' ? 'selected' : '' }}>
                                                            Reprobado</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mt-3 text-right">
                                                <button type="submit"
                                                    class="btn btn-warning text-white">Actualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- 🚌 Gestión de Vehículos -->
    <div class="card card-success elevation-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title"><i class="fas fa-bus"></i> Gestión de Vehículos</h3>
            <button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#modalAddVehiculo">
                <i class="fas fa-plus-circle"></i> Nuevo Vehículo
            </button>
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
                        <th>Chofer Asignado</th>
                        <th>Revisión Técnica</th>
                        <th>SOAT</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empresa->vehiculos as $i => $vehiculo)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $vehiculo->placa }}</td>
                            <td>{{ $vehiculo->modelo }}</td>
                            <td>{{ $vehiculo->color }}</td>
                            <td>{{ $vehiculo->capacidad }}</td>

                            <td>
                                @if ($vehiculo->chofer)
                                    <strong>{{ $vehiculo->chofer->nombres }}
                                        {{ $vehiculo->chofer->apellidos }}</strong><br>
                                    <small class="text-muted">🚍 {{ $vehiculo->chofer->ruta_asignada }}</small><br>
                                    <span
                                        class="badge bg-{{ $vehiculo->chofer->estado_licencia == 'Activa'
                                            ? 'success'
                                            : ($vehiculo->chofer->estado_licencia == 'Pendiente'
                                                ? 'warning text-dark'
                                                : 'danger') }}">
                                        {{ $vehiculo->chofer->estado_licencia }}
                                    </span>
                                @else
                                    —
                                @endif
                            </td>

                            <td>
                                <span
                                    class="badge
            @if ($vehiculo->revision_tecnica == 'Vigente') bg-success
            @elseif ($vehiculo->revision_tecnica == 'Por vencer') bg-warning text-dark
            @else bg-danger @endif">
                                    {{ $vehiculo->revision_tecnica }}
                                </span>
                            </td>

                            <td>
                                <span
                                    class="badge
            @if ($vehiculo->soat == 'Vigente') bg-success
            @elseif ($vehiculo->soat == 'Por vencer') bg-warning text-dark
            @else bg-danger @endif">
                                    {{ $vehiculo->soat }}
                                </span>
                            </td>

                            <td>
                                <button class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#modalEditVehiculo{{ $vehiculo->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('vehiculo.destroy', $vehiculo->id) }}" method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('¿Estás seguro de eliminar el vehículo {{ $vehiculo->placa }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        {{-- Modal editar vehículo {{ $vehiculo->id }} --}}
                        <div class="modal fade" id="modalEditVehiculo{{ $vehiculo->id }}" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-success text-white">
                                        <h5 class="modal-title"><i class="fas fa-edit"></i> Editar Vehículo</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('vehiculo.update', $vehiculo->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="empresa_id" value="{{ $empresa->id }}">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Placa</label>
                                                    <input type="text" name="placa" class="form-control"
                                                        value="{{ $vehiculo->placa }}" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Modelo</label>
                                                    <input type="text" name="modelo" class="form-control"
                                                        value="{{ $vehiculo->modelo }}" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Color</label>
                                                    <input type="text" name="color" class="form-control"
                                                        value="{{ $vehiculo->color }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Capacidad</label>
                                                    <input type="number" name="capacidad" class="form-control"
                                                        value="{{ $vehiculo->capacidad }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Chofer Asignado</label>
                                                    <select name="chofer_id" class="form-control">
                                                        <option value="">— Seleccionar —</option>
                                                        @foreach ($empresa->choferes as $chofer)
                                                            <option value="{{ $chofer->id }}"
                                                                {{ $vehiculo->chofer_id == $chofer->id ? 'selected' : '' }}>
                                                                {{ $chofer->nombres }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Revisión Técnica</label>
                                                    <select name="revision_tecnica" class="form-control">
                                                        <option value="Vigente"
                                                            {{ $vehiculo->revision_tecnica == 'Vigente' ? 'selected' : '' }}>
                                                            Vigente</option>
                                                        <option value="Por vencer"
                                                            {{ $vehiculo->revision_tecnica == 'Por vencer' ? 'selected' : '' }}>
                                                            Por vencer</option>
                                                        <option value="Vencida"
                                                            {{ $vehiculo->revision_tecnica == 'Vencida' ? 'selected' : '' }}>
                                                            Vencida</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>SOAT</label>
                                                    <select name="soat" class="form-control">
                                                        <option value="Vigente"
                                                            {{ $vehiculo->soat == 'Vigente' ? 'selected' : '' }}>Vigente
                                                        </option>
                                                        <option value="Por vencer"
                                                            {{ $vehiculo->soat == 'Por vencer' ? 'selected' : '' }}>Por
                                                            vencer</option>
                                                        <option value="Vencido"
                                                            {{ $vehiculo->soat == 'Vencido' ? 'selected' : '' }}>Vencido
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mt-3 text-right">
                                                <button class="btn btn-success">Actualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- 🔹 Modal para agregar chofer --}}
    <div class="modal fade" id="modalAddChofer" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title"><i class="fas fa-id-badge"></i> Registrar Chofer</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('chofer.store') }}">
                        @csrf
                        <input type="hidden" name="empresa_id" value="{{ $empresa->id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nombres</label>
                                <input type="text" name="nombres" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label>Apellidos</label>
                                <input type="text" name="apellidos" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label>DNI</label>
                                <input type="text" name="dni" maxlength="8" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label>Teléfono</label>
                                <input type="text" name="telefono" maxlength="9" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label>Licencia</label>
                                <input type="text" name="licencia" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>Ruta Asignada</label>
                                <input type="text" name="ruta_asignada" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>Estado Licencia</label>
                                <select name="estado_licencia" class="form-control">
                                    <option value="Activa">Activa</option>
                                    <option value="Inactiva">Inactiva</option>
                                    <option value="Pendiente">Pendiente</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Educación Vial</label>
                                <select name="educacion_vial" class="form-control">
                                    <option value="Aprobado">Aprobado</option>
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="Reprobado">Reprobado</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-3 text-right">
                            <button class="btn btn-warning text-white">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- 🔹 Modal para agregar vehículo --}}
    <div class="modal fade" id="modalAddVehiculo" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title"><i class="fas fa-bus"></i> Registrar Vehículo</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('vehiculo.store') }}">
                        @csrf
                        <input type="hidden" name="empresa_id" value="{{ $empresa->id }}">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Placa</label>
                                <input type="text" name="placa" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label>Modelo</label>
                                <input type="text" name="modelo" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label>Color</label>
                                <input type="text" name="color" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label>Capacidad</label>
                                <input type="number" name="capacidad" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label>Chofer Asignado</label>
                                <select name="chofer_id" class="form-control">
                                    <option value="">— Seleccionar —</option>
                                    @foreach ($empresa->choferes as $chofer)
                                        <option value="{{ $chofer->id }}">{{ $chofer->nombres }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>Revisión Técnica</label>
                                <select name="revision_tecnica" class="form-control">
                                    <option value="Vigente">Vigente</option>
                                    <option value="Por vencer">Por vencer</option>
                                    <option value="Vencida">Vencida</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>SOAT</label>
                                <select name="soat" class="form-control">
                                    <option value="Vigente">Vigente</option>
                                    <option value="Por vencer">Por vencer</option>
                                    <option value="Vencido">Vencido</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-3 text-right">
                            <button class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
