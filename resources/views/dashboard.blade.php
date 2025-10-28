@extends('adminlte::page')

@section('title', 'Inicio - Transporte Público Juliaca')

@section('content_header')
    <h1 class="text-primary"><i class="fas fa-bus"></i> Panel de Control - Transporte Público</h1>
@stop

@section('content')
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
                    <span class="progress-description">
                        <a href="#" class="text-white">Más info <i class="fas fa-arrow-circle-right"></i></a>
                    </span>
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
                    <span class="progress-description">
                        <a href="#" class="text-white">Más info <i class="fas fa-arrow-circle-right"></i></a>
                    </span>
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
                    <span class="progress-description">
                        <a href="#" class="text-white">Más info <i class="fas fa-arrow-circle-right"></i></a>
                    </span>
                </div>
            </div>
        </div>

        <!-- Empresa Línea 18 -->
        <div class="col-lg-3 col-6">
            <div class="info-box elevation-4" style="background: linear-gradient(135deg, #e53935, #ffebee); color: white;">
                <span class="info-box-icon"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Empresa Línea 18</span>
                    <span class="info-box-number">1,250</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 45%; background-color: rgba(255,255,255,0.6);"></div>
                    </div>
                    <span class="progress-description">
                        <a href="#" class="text-white">Más info <i class="fas fa-arrow-circle-right"></i></a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráfica y mapa -->
    <div class="row mt-4">
        <div class="col-lg-7">
            <div class="card card-info card-outline elevation-3">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">
                            <i class="fas fa-route"></i> Viajes Realizados por Día
                        </h3>
                        <div class="card-tools">
                            <button class="btn btn-tool btn-sm" title="Opciones">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <canvas id="salesChart" height="250"></canvas>
                </div>

                <div class="card-footer text-center text-muted small">
                    <i class="fas fa-info-circle"></i> Datos basados en el número total de viajes completados por las
                    empresas.
                </div>
            </div>
        </div>

          <!-- rutas  -->
        <div class="col-lg-5">
            <div class="card card-dark card-outline elevation-3">
    <div class="card-header border-0">
        <h3 class="card-title"><i class="fas fa-map-marked-alt"></i> Empresas de Transporte - Según la empresa</h3>
    </div>

    <div class="card-body" style="background-color: #454D55; border-radius: 10px;">
        <div class="text-center mb-4">
            <h4 class="mb-1"><i class="fas fa-bus-alt"></i> Transporte Público Juliaca</h4>
            <p class="text-muted mb-0">Empresas registradas en el sistema</p>
        </div>

        <div class="row">
            <!-- Empresa Naranja -->
            <div class="col-md-6 mb-3">
                <div class="card shadow-sm border-0 h-100" 
                     style="background: linear-gradient(135deg, #ff9800, #ffb81d); color: white; border-radius: 12px;">
                    <div class="card-body text-center">
                        <i class="fas fa-route fa-3x mb-2"></i>
                        <h5 class="fw-bold mb-1">Empresa Naranja</h5>
                        <p class="mb-1">Rutas: 12</p>
                        <p class="mb-0 small opacity-75">Cobertura: Zona Norte</p>
                    </div>
                </div>
            </div>

            <!-- Empresa Línea 55 -->
            <div class="col-md-6 mb-3">
                <div class="card shadow-sm border-0 h-100" 
                     style="background: linear-gradient(135deg, #66bb6a, #b2ff19); color: white; border-radius: 12px;">
                    <div class="card-body text-center">
                        <i class="fas fa-bus fa-3x mb-2"></i>
                        <h5 class="fw-bold mb-1">Empresa Línea 55</h5>
                        <p class="mb-1">Rutas: 8</p>
                        <p class="mb-0 small opacity-75">Cobertura: Zona Este</p>
                    </div>
                </div>
            </div>

            <!-- Empresa Línea 22 -->
            <div class="col-md-6 mb-3">
                <div class="card shadow-sm border-0 h-100" 
                     style="background: linear-gradient(135deg, #26a69a, #00bcd4); color: white; border-radius: 12px;">
                    <div class="card-body text-center">
                        <i class="fas fa-bus-alt fa-3x mb-2"></i>
                        <h5 class="fw-bold mb-1">Empresa Línea 22</h5>
                        <p class="mb-1">Rutas: 10</p>
                        <p class="mb-0 small opacity-75">Cobertura: Zona Centro</p>
                    </div>
                </div>
            </div>

            <!-- Empresa Línea 18 -->
            <div class="col-md-6 mb-3">
                <div class="card shadow-sm border-0 h-100" 
                     style="background: linear-gradient(135deg, #e53935, #ffebee); color: white; border-radius: 12px;">
                    <div class="card-body text-center">
                        <i class="fas fa-users fa-3x mb-2"></i>
                        <h5 class="fw-bold mb-1">Empresa Línea 18</h5>
                        <p class="mb-1">Rutas: 6</p>
                        <p class="mb-0 small opacity-75">Cobertura: Zona Sur</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>

    </div>
    </div>

    <!-- Tarjetas -->
    <div class="row mt-3">
        <div class="col-lg-3 col-md-6 col-12 mb-4">
            <div class="card card-widget widget-user elevation-4">
                <div class="widget-user-header"
                    style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); height: 140px;">
                    <div class="text-center pt-3"><i class="fas fa-route fa-4x text-white opacity-75"></i></div>
                </div>
                <div class="card-footer text-center" style="padding-top: 20px;">
                    <h5 class="widget-user-username mb-2 text-primary font-weight-bold">Ver Rutas</h5>
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
                <div class="card-footer text-center" style="padding-top: 20px;">
                    <h5 class="widget-user-username mb-2 text-success font-weight-bold">Horarios</h5>
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
                <div class="card-footer text-center" style="padding-top: 20px;">
                    <h5 class="widget-user-username mb-2 text-info font-weight-bold">Ubicación en Vivo</h5>
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
                <div class="card-footer text-center" style="padding-top: 20px;">
                    <h5 class="widget-user-username mb-2 text-warning font-weight-bold">Chat Bot</h5>
                    <p class="text-muted mb-3">Asistente virtual del transporte</p>
                    <a href="#" class="btn btn-warning btn-sm px-4 rounded-pill"><i class="fas fa-robot"></i>
                        Chatear</a>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        /* estilos de dashboard y footer */
        .footer-uber {
            background-color: #454D55;
            color: #fff;
            font-size: 1rem;
        }

        .footer-uber a {
            transition: color 0.3s ease;
        }

        .footer-uber a:hover {
            color: #1db954;
        }

        .footer-uber h4 {
            font-weight: 700;
            color: #fff;
        }

        .footer-uber p,
        .footer-uber li {
            color: rgba(255, 255, 255, 0.8);
        }

        .social-icon {
            font-size: 2.5rem;
            /* íconos más grandes */
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            transform: scale(1.2);
            color: #1db954;
        }


        @media (max-width: 768px) {
            .social-icon {
                font-size: 1.8rem;
                margin: 0 10px;
            }
        }

        .footer-uber h4,
        .footer-uber h5 {
            font-weight: 700;
            color: #fff;
        }

        .footer-uber a {
            transition: color 0.3s;
        }

        .footer-uber a:hover {
            color: #1db954;
        }

        .footer-uber hr {
            border-top: 1px solid rgba(#454D55);
        }

        .footer-uber ul li {
            margin-bottom: 6px;
        }

        .footer-uber p,
        .footer-uber li {
            color: rgba(255, 255, 255, 0.7);
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script>
        console.log("🚌 Cargando gráfico de Viajes Realizados (modo demo)");

        document.addEventListener('DOMContentLoaded', () => {
            const ctx = document.getElementById('salesChart');

            if (ctx) {
                // 🚀 Datos simulados (mientras no hay base de datos)
                const dataDemo = [{
                        fecha: 'Lunes',
                        viajes_realizados: 10
                    },
                    {
                        fecha: 'Martes',
                        viajes_realizados: 15
                    },
                    {
                        fecha: 'Miércoles',
                        viajes_realizados: 12
                    },
                    {
                        fecha: 'Jueves',
                        viajes_realizados: 20
                    },
                    {
                        fecha: 'Viernes',
                        viajes_realizados: 18
                    },
                    {
                        fecha: 'Sábado',
                        viajes_realizados: 25
                    },
                    {
                        fecha: 'Domingo',
                        viajes_realizados: 30
                    }
                ];

                const labels = dataDemo.map(item => item.fecha);
                const valores = dataDemo.map(item => item.viajes_realizados);

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Viajes realizados por día',
                            data: valores,
                            fill: true,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: '#4fc3f7',
                            borderWidth: 2,
                            pointBackgroundColor: '#4fc3f7',
                            tension: 0.35
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    color: '#fff',
                                    font: {
                                        size: 13,
                                        family: "'Poppins', sans-serif"
                                    }
                                }
                            },
                            tooltip: {
                                backgroundColor: '#222',
                                titleColor: '#fff',
                                bodyColor: '#fff'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Número de viajes',
                                    color: '#bbb'
                                },
                                ticks: {
                                    color: '#ccc'
                                },
                                grid: {
                                    color: 'rgba(255,255,255,0.05)'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Días de la semana',
                                    color: '#bbb'
                                },
                                ticks: {
                                    color: '#ccc'
                                },
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            }
        });
    </script>


@stop

{{-- ====== FOOTER ESTILO UBER ====== --}}

@section('footer')
    <footer class="footer-uber mt-5">
        <div class="container py-5">
            <div class="row text-white">
                <div class="col-md-3 mb-4">
                    <h4 class="fw-bold mb-3 fs-3">Transporte Juliaca</h4>
                    <p class="text-muted fs-5">Visita el centro de ayuda<br>o consulta nuestras rutas disponibles.</p>
                    <a href="#" class="text-light fs-5">Centro de Ayuda</a>
                </div>

                <div class="col-md-3 mb-4">
                    <h4 class="fw-bold mb-3 fs-4">Compañía</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light text-decoration-none fs-5">Quiénes somos</a></li>
                        <li><a href="#" class="text-light text-decoration-none fs-5">Servicios</a></li>
                        <li><a href="#" class="text-light text-decoration-none fs-5">Noticias</a></li>
                        <li><a href="#" class="text-light text-decoration-none fs-5">Inversiones</a></li>
                        <li><a href="#" class="text-light text-decoration-none fs-5">Blog</a></li>
                    </ul>
                </div>

                <div class="col-md-3 mb-4">
                    <h4 class="fw-bold mb-3 fs-4">Productos</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light text-decoration-none fs-5">Viaja</a></li>
                        <li><a href="#" class="text-light text-decoration-none fs-5">Conduce</a></li>
                        <li><a href="#" class="text-light text-decoration-none fs-5">Comida</a></li>
                        <li><a href="#" class="text-light text-decoration-none fs-5">Empresas</a></li>
                        <li><a href="#" class="text-light text-decoration-none fs-5">Tarjetas de recarga</a></li>
                    </ul>
                </div>

                <div class="col-md-3 mb-4">
                    <h4 class="fw-bold mb-3 fs-4">Ciudades</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light text-decoration-none fs-5">Reserva</a></li>
                        <li><a href="#" class="text-light text-decoration-none fs-5">Terminales</a></li>
                        <li><a href="#" class="text-light text-decoration-none fs-5">Zonas</a></li>
                        <li><a href="#" class="text-light text-decoration-none fs-5">Aeropuertos</a></li>
                    </ul>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="#" class="text-light mx-4 social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-light mx-4 social-icon"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-light mx-4 social-icon"><i class="fab fa-whatsapp"></i></a>
            </div>

            <hr style="border-color: rgba(#454D55); margin-top: 2rem;">
            <div class="text-center text-muted fs-6 pt-3">
                © 2025 <strong>Transporte Público Juliaca</strong> — Desarrollado por <strong>Heiner Apaza</strong>.
            </div>
        </div>
    </footer>
@stop
