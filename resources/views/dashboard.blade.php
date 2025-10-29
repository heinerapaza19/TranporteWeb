@extends('adminlte::page')

@section('title', 'Inicio - Transporte Público Juliaca')

@section('content_header')
    <h1 class="text-primary"><i class="fas fa-bus"></i> Panel de Control - Transporte Público</h1>
@stop

@section('content')
    {{-- ==== INFOBOX EMPRESAS ==== --}}
    <div class="row">
        <!-- Empresa Naranja -->
        <div class="col-lg-3 col-6">
            <div class="info-box elevation-4" style="background: linear-gradient(135deg, #ff9800, #ffb81d); color: white;">
                <span class="info-box-icon"><i class="fas fa-route"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Empresa Naranja</span>
                    <span class="info-box-number">12</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 70%; background-color: rgba(255,255,255,0.6);"></div>
                    </div>
                    <a href="{{ route('empresa.naranja') }}" class="text-white">
                        Más info <i class="fas fa-arrow-circle-right"></i>
                    </a>

                </div>
            </div>
        </div>

        <!-- Empresa Línea 55 -->
        <div class="col-lg-3 col-6">
            <div class="info-box elevation-4" style="background: linear-gradient(135deg, #66bb6a, #b2ff19); color: white;">
                <span class="info-box-icon"><i class="fas fa-id-badge"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Empresa Línea 55</span>
                    <span class="info-box-number">48</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 85%; background-color: rgba(255,255,255,0.6);"></div>
                    </div>
                    <a href="{{ route('empresa.55') }}" class="text-white">
                        Más info <i class="fas fa-arrow-circle-right"></i>
                    </a>

                </div>
            </div>
        </div>

        <!-- Empresa Línea 22 -->
        <div class="col-lg-3 col-6">
            <div class="info-box elevation-4" style="background: linear-gradient(135deg, #26a69a, #00bcd4); color: white;">
                <span class="info-box-icon"><i class="fas fa-bus-alt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Empresa Línea 22</span>
                    <span class="info-box-number">95</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 60%; background-color: rgba(255,255,255,0.6);"></div>
                    </div>
                    <a href="{{ route('empresa.22') }}" class="text-white">
                        Más info <i class="fas fa-arrow-circle-right"></i>
                    </a>

                </div>
            </div>
        </div>

        <!-- Empresa Línea 18 -->
        <div class="col-lg-3 col-6">
            <div class="info-box elevation-4" style="background: linear-gradient(135deg, #e53935, #ff6f60); color: white;">
                <span class="info-box-icon"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Empresa Línea 18</span>
                    <span class="info-box-number">1,250</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 45%; background-color: rgba(255,255,255,0.6);"></div>
                    </div>
                    <a href="{{ route('empresa.18') }}" class="text-white">
                        Más info <i class="fas fa-arrow-circle-right"></i>
                    </a>

                </div>
            </div>
        </div>
    </div>

    {{-- ==== GRÁFICO Y MAPAS ==== --}}
    <div class="row mt-4">
        <div class="col-lg-7">
            <div class="card card-info card-outline elevation-3">
                <div class="card-header border-0 d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">
                        <i class="fas fa-route"></i> Viajes Realizados por Día
                    </h3>
                    <button class="btn btn-tool btn-sm"><i class="fas fa-bars"></i></button>
                </div>
                <div class="card-body">
                    <canvas id="salesChart" height="250"></canvas>
                </div>
                <div class="card-footer text-center text-muted small">
                    <i class="fas fa-info-circle"></i> Datos basados en viajes completados.
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card card-outline elevation-3 bg-white text-dark border-0">
                <div class="card-header border-0 bg-white">
                    <h3 class="card-title text-dark">
                        <i class="fas fa-map-marked-alt"></i> Empresas de Transporte
                    </h3>
                </div>

                <div class="card-body" style="border-radius: 10px;">
                    <div class="text-center mb-4">
                        <h4 class="mb-1 text-dark"><i class="fas fa-bus-alt"></i> Transporte Público Juliaca</h4>
                        <p class="text-muted mb-0">Empresas registradas en el sistema</p>
                    </div>

                    <div class="row">
                        <!-- Naranja -->
                        <div class="col-md-6 mb-3">
                            <div class="card shadow-sm border-0 h-100"
                                style="background: linear-gradient(135deg, #ff9800, #ffb81d); color: white; border-radius: 12px;">
                                <div class="card-body text-center">
                                    <i class="fas fa-route fa-3x mb-2"></i>
                                    <h5 class="fw-bold mb-1">Empresa Naranja</h5>
                                    <p class="small opacity-75 mb-2">Cobertura: Zona Norte</p>
                                    <a href="{{ url('/mapa/naranja') }}"
                                        class="btn btn-warning btn-sm px-4 rounded-pill text-white fw-bold">
                                        <i class="fas fa-map-marked-alt"></i> Ver mapa
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Línea 55 -->
                        <div class="col-md-6 mb-3">
                            <div class="card shadow-sm border-0 h-100"
                                style="background: linear-gradient(135deg, #66bb6a, #b2ff19); color: white; border-radius: 12px;">
                                <div class="card-body text-center">
                                    <i class="fas fa-bus fa-3x mb-2"></i>
                                    <h5 class="fw-bold mb-1">Línea 55</h5>
                                    <p class="small opacity-75 mb-2">Cobertura: Zona Este</p>
                                    <a href="{{ url('/mapa/55') }}"
                                        class="btn btn-success btn-sm px-4 rounded-pill text-white fw-bold">
                                        <i class="fas fa-map-marked-alt"></i> Ver mapa
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Línea 22 -->
                        <div class="col-md-6 mb-3">
                            <div class="card shadow-sm border-0 h-100"
                                style="background: linear-gradient(135deg, #26a69a, #00bcd4); color: white; border-radius: 12px;">
                                <div class="card-body text-center">
                                    <i class="fas fa-bus-alt fa-3x mb-2"></i>
                                    <h5 class="fw-bold mb-1">Línea 22</h5>
                                    <p class="small opacity-75 mb-2">Cobertura: Zona Centro</p>
                                    <a href="{{ url('/mapa/22') }}" class="text-white fw-bold">
                                        Ver mapa <i class="fas fa-arrow-circle-right"></i>
                                    </a>

                                </div>
                            </div>
                        </div>

                        <!-- Línea 18 -->
                        <div class="col-md-6 mb-3">
                            <div class="card shadow-sm border-0 h-100"
                                style="background: linear-gradient(135deg, #e53935, #ff6f60); color: white; border-radius: 12px;">
                                <div class="card-body text-center">
                                    <i class="fas fa-users fa-3x mb-2"></i>
                                    <h5 class="fw-bold mb-1">Línea 18</h5>
                                    <p class="small opacity-75 mb-2">Cobertura: Zona Sur</p>
                                    <a href="{{ url('/mapa/18') }}"
                                        class="btn btn-danger btn-sm px-4 rounded-pill text-white fw-bold">
                                        <i class="fas fa-map-marked-alt"></i> Ver mapa
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ==== TARJETAS DE SERVICIOS ==== --}}
    <div class="row mt-4">
        <div class="col-lg-3 col-md-6 col-12 mb-4">
            <div class="card card-widget widget-user elevation-4">
                <div class="widget-user-header"
                    style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); height: 140px;">
                    <div class="text-center pt-3"><i class="fas fa-route fa-4x text-white opacity-75"></i></div>
                </div>
                <div class="card-footer text-center">
                    <h5 class="text-primary font-weight-bold mb-2">Ver Rutas</h5>
                    <p class="text-muted mb-3">Explora todas las rutas disponibles</p>
                    <a href="#" class="btn btn-primary btn-sm px-4 rounded-pill"><i class="fas fa-search"></i>
                        Consultar</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-12 mb-4">
            <div class="card card-widget widget-user elevation-4">
                <div class="widget-user-header bg-gradient-success" style="height: 140px;">
                    <div class="text-center pt-3"><i class="fas fa-clock fa-4x text-white opacity-75"></i></div>
                </div>
                <div class="card-footer text-center">
                    <h5 class="text-success font-weight-bold mb-2">Horarios</h5>
                    <p class="text-muted mb-3">Revisa horarios de salida y llegada</p>
                    <a href="#" class="btn btn-success btn-sm px-4 rounded-pill"><i
                            class="fas fa-calendar-alt"></i> Ver Horarios</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-12 mb-4">
            <div class="card card-widget widget-user elevation-4">
                <div class="widget-user-header"
                    style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); height: 140px;">
                    <div class="text-center pt-3"><i class="fas fa-ticket-alt fa-4x text-white opacity-75"></i></div>
                </div>
                <div class="card-footer text-center">
                    <h5 class="text-info font-weight-bold mb-2">Ubicación en Vivo</h5>
                    <p class="text-muted mb-3">Rastrea tu transporte en tiempo real</p>
                    <a href="#" class="btn btn-info btn-sm px-4 rounded-pill"><i class="fas fa-map-marked-alt"></i>
                        Ver Ubicación</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-12 mb-4">
            <div class="card card-widget widget-user elevation-4">
                <div class="widget-user-header bg-gradient-warning" style="height: 140px;">
                    <div class="text-center pt-3"><i class="fas fa-comments fa-4x text-white opacity-75"></i></div>
                </div>
                <div class="card-footer text-center">
                    <h5 class="text-warning font-weight-bold mb-2">Chat Bot</h5>
                    <p class="text-muted mb-3">Asistente virtual del transporte</p>
                    <a href="#" class="btn btn-warning btn-sm px-4 rounded-pill"><i class="fas fa-robot"></i>
                        Chatear</a>
                </div>
            </div>
        </div>
    </div>
@stop

{{-- ==== CSS Y FOOTER FINAL ==== --}}
@section('css')
    <style>
        /* ==== ARREGLO DE CABECERAS DE TARJETAS ==== */
        .card-header {
            background-color: #454D55 !important;
            color: #fff !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Para las tarjetas “card-outline” blancas */
        .card-outline {
            background-color: #454D55 !important;
            color: #fff !important;
        }

        /* También ajusta texto e íconos */
        .card-title,
        .card-title i {
            color: #fff !important;
        }

        /* ===== 🎨 COLOR DE FONDO PRINCIPAL ===== */
        .content-wrapper,
        .main-footer,
        .main-header {
            background-color: #454D55 !important;
            /* fondo igual al footer */
        }

        /* Opcional: mejora contraste de tarjetas dentro */
        .card {
            background-color: #50575f !important;
            border: none !important;
        }

        .footer-uber {
            background-color: #454D55;
            color: #fff;
            width: 100%;
            padding: 3rem 0 1.5rem;
            font-family: 'Poppins', sans-serif;
            margin-top: 3rem;
        }

        .footer-uber a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: 0.3s;
        }

        .footer-uber a:hover {
            color: #1db954;
        }

        .footer-uber h4 {
            font-weight: 700;
            text-transform: uppercase;
        }

        .footer-uber .social-icon {
            font-size: 2.5rem;
            margin: 0 15px;
            color: #1db954;
            transition: all 0.3s ease;
            filter: drop-shadow(0 0 5px rgba(29, 185, 84, 0.4));
        }

        .footer-uber .social-icon:hover {
            transform: scale(1.2);
            text-shadow: 0 0 10px #1db954;
        }

        .footer-uber hr {
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            width: 85%;
            margin: 2rem auto 1rem;
        }

        .footer-uber .copyright {
            color: rgba(255, 255, 255, 0.7);
            text-align: center;
            font-size: 0.9rem;
        }
    </style>
@stop

@section('footer')
    <footer class="footer-uber">
        <div class="container">
            <div class="row text-white">
                <div class="col-md-3 mb-4">
                    <h4>Transporte Juliaca</h4>
                    <p>Visita el centro de ayuda o consulta nuestras rutas disponibles.</p>
                    <a href="#">Centro de Ayuda</a>
                </div>
                <div class="col-md-3 mb-4">
                    <h4>Compañía</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">Quiénes somos</a></li>
                        <li><a href="#">Servicios</a></li>
                        <li><a href="#">Noticias</a></li>
                        <li><a href="#">Inversiones</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h4>Productos</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">Viaja</a></li>
                        <li><a href="#">Conduce</a></li>
                        <li><a href="#">Comida</a></li>
                        <li><a href="#">Empresas</a></li>
                        <li><a href="#">Tarjetas de recarga</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h4>Ciudades</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">Reserva</a></li>
                        <li><a href="#">Terminales</a></li>
                        <li><a href="#">Zonas</a></li>
                        <li><a href="#">Aeropuertos</a></li>
                    </ul>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-whatsapp"></i></a>
            </div>

            <hr>

            <div class="copyright">
                © 2025 <strong>Transporte Público Juliaca</strong> — Desarrollado por <strong>Heiner Apaza</strong>.
            </div>
        </div>
    </footer>
@stop
