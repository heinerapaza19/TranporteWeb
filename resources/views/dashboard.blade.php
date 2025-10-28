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

    <!-- Empresa Línea 55 (verde claro) -->
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

    <!-- Empresa Línea 22 (verde + celeste) -->
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

    <!-- Empresa Línea 18 (rojo medio blanco) -->
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


    <!-- Gráfica de Rutas y Mapa -->
    <div class="row mt-4">
        <div class="col-lg-7">
            <div class="card card-primary card-outline elevation-3">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title"><i class="fas fa-chart-area"></i> Flujo de Pasajeros</h3>
                        <div class="card-tools">
                            <button class="btn btn-tool btn-sm"><i class="fas fa-bars"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="salesChart" height="250"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card card-success card-outline elevation-3">
                <div class="card-header border-0">
                    <h3 class="card-title"><i class="fas fa-map-marked-alt"></i> Cobertura Territorial</h3>
                    <div class="card-tools">
                        <button class="btn btn-tool btn-sm"><i class="fas fa-minus"></i></button>
                        <button class="btn btn-tool btn-sm"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="map-container"
                        style="height: 285px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); position: relative;">
                        <div class="text-center text-white pt-5">
                            <i class="fas fa-map-marker-alt fa-5x mb-3 opacity-50"></i>
                            <h4>Mapa de Rutas Juliaca</h4>
                            <p class="mb-4">Cobertura: 12 rutas activas</p>
                            <div class="row px-4">
                                <div class="col-4">
                                    <div class="small-box bg-light text-dark">
                                        <div class="inner p-2">
                                            <h4>Norte</h4>
                                            <p class="mb-0">4 rutas</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="small-box bg-light text-dark">
                                        <div class="inner p-2">
                                            <h4>Centro</h4>
                                            <p class="mb-0">5 rutas</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="small-box bg-light text-dark">
                                        <div class="inner p-2">
                                            <h4>Sur</h4>
                                            <p class="mb-0">3 rutas</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tarjetas de módulos mejoradas -->
    <div class="row mt-3">
    <!-- Módulo Ver Rutas -->
    <div class="col-lg-3 col-md-6 col-12 mb-4">
        <div class="card card-widget widget-user elevation-4">
            <div class="widget-user-header"
                style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); height: 140px;">
                <div class="text-center pt-3">
                    <i class="fas fa-route fa-4x text-white opacity-75"></i>
                </div>
            </div>
            <div class="card-footer text-center" style="padding-top: 20px;">
                <h5 class="widget-user-username mb-2 text-primary font-weight-bold">Ver Rutas</h5>
                <p class="text-muted mb-3">Explora todas las rutas disponibles</p>
                <a href="#" class="btn btn-primary btn-sm px-4 rounded-pill">
                    <i class="fas fa-search"></i> Consultar
                </a>
            </div>
        </div>
    </div>

    <!-- Módulo Horarios -->
    <div class="col-lg-3 col-md-6 col-12 mb-4">
        <div class="card card-widget widget-user elevation-4">
            <div class="widget-user-header bg-gradient-success" style="height: 140px;">
                <div class="text-center pt-3">
                    <i class="fas fa-clock fa-4x text-white opacity-75"></i>
                </div>
            </div>
            <div class="card-footer text-center" style="padding-top: 20px;">
                <h5 class="widget-user-username mb-2 text-success font-weight-bold">Horarios</h5>
                <p class="text-muted mb-3">Revisa horarios de salida y llegada</p>
                <a href="#" class="btn btn-success btn-sm px-4 rounded-pill">
                    <i class="fas fa-calendar-alt"></i> Ver Horarios
                </a>
            </div>
        </div>
    </div>

    <!-- Módulo Tarifas -->
    <div class="col-lg-3 col-md-6 col-12 mb-4">
        <div class="card card-widget widget-user elevation-4">
            <div class="widget-user-header"
                style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); height: 140px;">
                <div class="text-center pt-3">
                    <i class="fas fa-ticket-alt fa-4x text-white opacity-75"></i>
                </div>
            </div>
            <div class="card-footer text-center" style="padding-top: 20px;">
                <h5 class="widget-user-username mb-2 text-info font-weight-bold">Ubicación en Vivo</h5>
                <p class="text-muted mb-3">Rastrea tu transporte en tiempo real</p>
                <a href="#" class="btn btn-info btn-sm px-4 rounded-pill">
                    <i class="fas fa-money-bill-wave"></i> Ubicación en Vivo
                </a>
            </div>
        </div>
    </div>

    <!-- Módulo Ubicación en Tiempo Real -->
    <div class="col-lg-3 col-md-6 col-12 mb-4">
        <div class="card card-widget widget-user elevation-4">
            <div class="widget-user-header bg-gradient-warning" style="height: 140px;">
                <div class="text-center pt-3">
                    <i class="fas fa-map-marker-alt fa-4x text-white opacity-75"></i>
                </div>
            </div>
            <div class="card-footer text-center" style="padding-top: 20px;">
                <h5 class="widget-user-username mb-2 text-warning font-weight-bold">Chat bot</h5>
                <p class="text-muted mb-3">Chat bot </p>
                <a href="#" class="btn btn-warning btn-sm px-4 rounded-pill">
                    <i class="fas fa-map-marked-alt"></i> Chatear
                </a>
            </div>
        </div>
    </div>
</div>
@stop
@section('css')
    {{-- Estilos personalizados --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('css')
    <style>
        /* Info boxes mejorados */
        .info-box {
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .info-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .info-box-icon {
            border-radius: 10px 0 0 10px;
            font-size: 3rem;
            padding: 20px 0;
        }

        .info-box-number {
            font-size: 2rem;
            font-weight: bold;
        }

        .progress {
            height: 4px;
            margin-top: 10px;
            background-color: rgba(255, 255, 255, 0.3);
        }

        .progress-bar {
            background-color: rgba(255, 255, 255, 0.8);
        }

        /* Cards con efectos */
        .card {
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        /* Widget user mejorado */
        .widget-user .widget-user-header {
            border-radius: 15px 15px 0 0;
            position: relative;
            overflow: hidden;
        }

        .widget-user-header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: repeating-linear-gradient(45deg,
                    transparent,
                    transparent 10px,
                    rgba(255, 255, 255, .05) 10px,
                    rgba(255, 255, 255, .05) 20px);
        }

        /* Animaciones sutiles */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .widget-user-header i {
            animation: float 3s ease-in-out infinite;
        }

        /* Botones personalizados */
        .btn-sm {
            transition: all 0.3s ease;
        }

        .btn-sm:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Opacidad */
        .opacity-50 {
            opacity: 0.5;
        }

        .opacity-75 {
            opacity: 0.75;
        }

        /* Efectos para el mapa */
        .map-container {
            border-radius: 0 0 15px 15px;
            overflow: hidden;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .info-box-number {
                font-size: 1.5rem;
            }
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script>
        console.log("🚦 Dashboard de Transporte Público Juliaca - Estilo Moderno");

        // Gráfica de flujo de pasajeros
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('salesChart');
            if (ctx) {
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio'],
                        datasets: [{
                            label: 'Pasajeros (miles)',
                            data: [65, 59, 80, 81, 56, 75, 85],
                            fill: true,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgb(54, 162, 235)',
                            tension: 0.4
                        }, {
                            label: 'Viajes realizados',
                            data: [50, 65, 70, 75, 60, 85, 95],
                            fill: true,
                            backgroundColor: 'rgba(201, 203, 207, 0.2)',
                            borderColor: 'rgb(201, 203, 207)',
                            tension: 0.4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'bottom'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.05)'
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            // Usamos un observador para esperar a que AdminLTE cargue el navbar completo
            const observer = new MutationObserver(() => {
                const topnav = document.querySelector(
                '.navbar-nav.ml-auto'); // sección derecha del topbar (donde está el buscador)

                // Solo crear el botón si existe el topnav y aún no está el botón
                if (topnav && !document.getElementById('btnTheme')) {

                    // Crear el botón de modo claro/oscuro
                    const btn = document.createElement('button');
                    btn.id = 'btnTheme';
                    btn.innerHTML = '🌙'; // icono inicial
                    btn.className = 'btn btn-dark btn-sm ml-2';
                    btn.style.borderRadius = '50%';
                    btn.style.width = '36px';
                    btn.style.height = '36px';
                    btn.style.fontSize = '18px';
                    btn.title = 'Cambiar modo claro/oscuro';

                    // Insertar el botón a la derecha del buscador
                    topnav.appendChild(btn);

                    // Verificar modo guardado
                    const darkEnabled = localStorage.getItem('dark-mode') === 'true';
                    if (darkEnabled) {
                        document.body.classList.add('dark-mode');
                        btn.innerHTML = '☀️';
                        btn.classList.replace('btn-dark', 'btn-warning');
                    }

                    // Evento click
                    btn.addEventListener('click', () => {
                        const isDark = document.body.classList.toggle('dark-mode');
                        if (isDark) {
                            btn.innerHTML = '☀️';
                            btn.classList.replace('btn-dark', 'btn-warning');
                        } else {
                            btn.innerHTML = '🌙';
                            btn.classList.replace('btn-warning', 'btn-dark');
                        }
                        localStorage.setItem('dark-mode', isDark);
                    });

                    // Detener el observador
                    observer.disconnect();
                }
            });

            // Iniciar el observador para esperar el topnav
            observer.observe(document.body, {
                childList: true,
                subtree: true
            });
        });
    </script>
@stop
