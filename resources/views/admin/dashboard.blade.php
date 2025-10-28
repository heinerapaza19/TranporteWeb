@extends('adminlte::page')

@section('title', 'Panel - Transporte San Román')

@section('content_header')
    <h1 class="text-primary">
        <i class="fas fa-user-shield"></i> Panel del Administrador - Transporte San Román
    </h1>
@stop

@section('content')
    <div class="row">
        <!-- Rutas activas -->
        <div class="col-lg-3 col-6">
            <div class="info-box bg-gradient-info elevation-4">
                <span class="info-box-icon"><i class="fas fa-route"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Rutas activas</span>
                    <span class="info-box-number">8</span>
                </div>
            </div>
        </div>

        <!-- Choferes registrados -->
        <div class="col-lg-3 col-6">
            <div class="info-box bg-gradient-warning elevation-4">
                <span class="info-box-icon"><i class="fas fa-id-badge"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Choferes registrados</span>
                    <span class="info-box-number">12</span>
                </div>
            </div>
        </div>

        <!-- Vehículos registrados -->
        <div class="col-lg-3 col-6">
            <div class="info-box bg-gradient-success elevation-4">
                <span class="info-box-icon"><i class="fas fa-bus"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Vehículos registrados</span>
                    <span class="info-box-number">15</span>
                </div>
            </div>
        </div>

        <!-- Reportes -->
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

    <!-- Gestión de Choferes -->
    <div class="card card-warning elevation-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title"><i class="fas fa-id-badge"></i> Gestión de Choferes</h3>
            <button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#modalChofer">
                <i class="fas fa-plus-circle"></i> Agregar Chofer
            </button>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Teléfono</th>
                        <th>Ruta Asignada</th>
                        <th>Licencia</th>
                        <th>Educación Vial</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Juan Mamani</td>
                        <td>45678912</td>
                        <td>951234567</td>
                        <td>Ruta 1 - Central</td>
                        <td><span class="badge bg-success">Activa</span></td>
                        <td><span class="badge bg-success">Aprobado</span></td>
                        <td>
                            <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Carlos Quispe</td>
                        <td>78945612</td>
                        <td>940321654</td>
                        <td>Ruta 3 - Aeropuerto</td>
                        <td><span class="badge bg-danger">Inactiva</span></td>
                        <td><span class="badge bg-warning text-dark">Pendiente</span></td>
                        <td>
                            <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Chofer (actualizado con nuevos campos) -->
    <div class="modal fade" id="modalChofer" tabindex="-1" role="dialog" aria-labelledby="modalChoferLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="modalChoferLabel"><i class="fas fa-id-badge"></i> Registrar Chofer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Nombre completo</label>
                                <input type="text" class="form-control" placeholder="Ej. Juan Pérez">
                            </div>
                            <div class="form-group col-md-3">
                                <label>DNI</label>
                                <input type="text" class="form-control" maxlength="8">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Teléfono</label>
                                <input type="text" class="form-control" maxlength="9">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Ruta asignada</label>
                                <input type="text" class="form-control" placeholder="Ej. Ruta 1 - Central">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Fecha de ingreso</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Licencia</label>
                                <select class="form-control">
                                    <option value="Activa" selected>Activa</option>
                                    <option value="Inactiva">Inactiva</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Educación vial</label>
                                <select class="form-control">
                                    <option value="Aprobado" selected>Aprobado</option>
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="Reprobado">Reprobado</option>
                                </select>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-warning text-white">Guardar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Gestión de Vehículos -->
    <div class="card card-success elevation-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title"><i class="fas fa-bus"></i> Gestión de Vehículos</h3>
            <button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#modalVehiculo">
                <i class="fas fa-plus-circle"></i> Agregar Vehículo
            </button>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-hover">
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
                    <tr>
                        <td>1</td>
                        <td>X0R-325</td>
                        <td>Hyundai County</td>
                        <td>Blanco</td>
                        <td>30</td>
                        <td>Juan Mamani</td>
                        <td><span class="badge bg-success">Vigente</span></td>
                        <td><span class="badge bg-success">Vigente</span></td>
                        <td>
                            <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Z2B-458</td>
                        <td>Toyota Coaster</td>
                        <td>Azul</td>
                        <td>28</td>
                        <td>Carlos Quispe</td>
                        <td><span class="badge bg-danger">Vencida</span></td>
                        <td><span class="badge bg-warning text-dark">Por vencer</span></td>
                        <td>
                            <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Vehículo (actualizado con revisión técnica y SOAT) -->
    <div class="modal fade" id="modalVehiculo" tabindex="-1" role="dialog" aria-labelledby="modalVehiculoLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="modalVehiculoLabel"><i class="fas fa-bus"></i> Registrar Vehículo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Placa</label>
                                <input type="text" class="form-control" placeholder="Ej. X0R-325">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Modelo</label>
                                <input type="text" class="form-control" placeholder="Ej. Hyundai County">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Color</label>
                                <input type="text" class="form-control" placeholder="Ej. Blanco">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Capacidad</label>
                                <input type="number" class="form-control" placeholder="Ej. 30">
                            </div>
                            <div class="form-group col-md-5">
                                <label>Chofer asignado</label>
                                <input type="text" class="form-control" placeholder="Ej. Juan Mamani">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Ruta</label>
                                <input type="text" class="form-control" placeholder="Ej. Ruta 1 - Central">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Revisión técnica</label>
                                <select class="form-control">
                                    <option value="Vigente" selected>Vigente</option>
                                    <option value="Por vencer">Por vencer</option>
                                    <option value="Vencida">Vencida</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>SOAT</label>
                                <select class="form-control">
                                    <option value="Vigente" selected>Vigente</option>
                                    <option value="Por vencer">Por vencer</option>
                                    <option value="Vencido">Vencido</option>
                                </select>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Chofer -->
    <div class="modal fade" id="modalChofer" tabindex="-1" role="dialog" aria-labelledby="modalChoferLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="modalChoferLabel"><i class="fas fa-id-badge"></i> Registrar Chofer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Nombre completo</label>
                                <input type="text" class="form-control" placeholder="Ej. Juan Pérez">
                            </div>
                            <div class="form-group col-md-3">
                                <label>DNI</label>
                                <input type="text" class="form-control" maxlength="8">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Teléfono</label>
                                <input type="text" class="form-control" maxlength="9">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Ruta asignada</label>
                                <input type="text" class="form-control" placeholder="Ej. Ruta 1 - Central">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Fecha de ingreso</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Licencia</label>
                                <select class="form-control">
                                    <option value="Activa" selected>Activa</option>
                                    <option value="Inactiva">Inactiva</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Educación vial</label>
                                <select class="form-control">
                                    <option value="Aprobado" selected>Aprobado</option>
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="Reprobado">Reprobado</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-warning text-white">Guardar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Vehículo -->
    <div class="modal fade" id="modalVehiculo" tabindex="-1" role="dialog" aria-labelledby="modalVehiculoLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="modalVehiculoLabel"><i class="fas fa-bus"></i> Registrar Vehículo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Placa</label>
                                <input type="text" class="form-control" placeholder="Ej. X0R-325">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Modelo</label>
                                <input type="text" class="form-control" placeholder="Ej. Hyundai County">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Color</label>
                                <input type="text" class="form-control" placeholder="Ej. Blanco">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Capacidad</label>
                                <input type="number" class="form-control" placeholder="Ej. 30">
                            </div>
                            <div class="form-group col-md-5">
                                <label>Chofer asignado</label>
                                <input type="text" class="form-control" placeholder="Ej. Juan Mamani">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Ruta</label>
                                <input type="text" class="form-control" placeholder="Ej. Ruta 1 - Central">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Revisión técnica</label>
                                <select class="form-control">
                                    <option value="Vigente" selected>Vigente</option>
                                    <option value="Por vencer">Por vencer</option>
                                    <option value="Vencida">Vencida</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>SOAT</label>
                                <select class="form-control">
                                    <option value="Vigente" selected>Vigente</option>
                                    <option value="Por vencer">Por vencer</option>
                                    <option value="Vencido">Vencido</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </div>

@stop
