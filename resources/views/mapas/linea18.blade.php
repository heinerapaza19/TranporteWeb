@extends('adminlte::page')

@section('title', 'Mapa Línea 18')

@section('content_header')
    <h1 class="text-primary">
        <i class="fas fa-bus"></i> Línea 18
        <small class="text-muted" style="font-size: 14px;">Ruta oficial - San Román</small>
    </h1>
@stop

@section('content')
    <div class="row">
        <!-- Panel izquierdo -->
        <div class="col-md-3">
            <div class="card elevation-3" style="border-radius: 10px;">
                <div class="card-header text-white"
                    style="background: linear-gradient(135deg, #1a237e 0%, #3949ab 100%);
                           border-top-left-radius:10px; border-top-right-radius:10px;">
                    <strong><i class="fas fa-route"></i> Línea 18</strong>
                </div>
                <div class="card-body">
                    <p class="mb-1"><strong>Código:</strong> 18</p>
                    <p class="mb-1"><strong>Cobertura:</strong> Zona Sur</p>
                    <hr>
                    <p class="text-muted mb-2" style="font-size: 14px;">
                        Mapa satelital con el recorrido completo de la Línea 18 en Juliaca.
                    </p>
                </div>
            </div>
        </div>

        <!-- Mapa -->
        <div class="col-md-9">
            <div class="card elevation-3" style="border-radius: 10px;">
                <div class="card-header bg-white">
                    <strong><i class="fas fa-map-marked-alt text-primary"></i> Mapa de Ruta</strong>
                </div>
                <div class="card-body p-0">
                    <div id="map" style="height: 500px; border-bottom-left-radius:10px; border-bottom-right-radius:10px;"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Leaflet base --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        // 🗺️ Inicializar mapa centrado en Juliaca
        var map = L.map('map').setView([-15.4939, -70.1164], 13);

        // 🌎 Capa satélite tipo Google Maps (Hybrid)
        var googleHybrid = L.tileLayer(
            'https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}',
            {
                maxZoom: 20,
                subdomains: ['mt0','mt1','mt2','mt3'],
                attribution: '© Google Maps'
            }
        ).addTo(map);

        // 🚍 Coordenadas reales Línea 18
        var linea18Coords = [
            [-15.513593, -70.175983],
            [-15.513684, -70.176093],
            [-15.513834, -70.175935],
            [-15.513661, -70.175707],
            [-15.513599, -70.175154],
            [-15.513529, -70.174491],
            [-15.513485, -70.174220],
            [-15.513445, -70.173731],
            [-15.513367, -70.173227],
            [-15.513238, -70.172159],
            [-15.512178, -70.171125],
            [-15.511372, -70.170412],
            [-15.510085, -70.168877],
            [-15.509707, -70.168302],
            [-15.508570, -70.166719],
            [-15.508100, -70.165893],
            [-15.506777, -70.164082],
            [-15.506270, -70.163325],
            [-15.505138, -70.161683],
            [-15.503396, -70.159037],
            [-15.503101, -70.158415],
            [-15.502776, -70.157712],
            [-15.501855, -70.155506],
            [-15.501152, -70.153660],
            [-15.499891, -70.150424],
            [-15.499555, -70.149619],
            [-15.498940, -70.147934],
            [-15.498707, -70.147193],
            [-15.498077, -70.146012],
            [-15.496970, -70.143721],
            [-15.496128, -70.142057],
            [-15.495270, -70.141343],
            [-15.493951, -70.140115],
            [-15.492923, -70.139138],
            [-15.492897, -70.138988],
            [-15.492111, -70.138843],
            [-15.490343, -70.138505],
            [-15.488601, -70.138156],
            [-15.488849, -70.137125],
            [-15.489351, -70.135038],
            [-15.489278, -70.134651],
            [-15.490462, -70.134195],
            [-15.490850, -70.134056],
            [-15.490498, -70.132993],
            [-15.490219, -70.132236],
            [-15.493967, -70.130782],
            [-15.493383, -70.129204],
            [-15.492592, -70.127036],
            [-15.491677, -70.124546],
            [-15.491212, -70.123403],
            [-15.489325, -70.124111],
            [-15.486559, -70.125217],
            [-15.485778, -70.125512],
            [-15.485065, -70.124766],
            [-15.483519, -70.123092],
            [-15.481875, -70.121482],
            [-15.483178, -70.120215],
            [-15.483521, -70.119927],
            [-15.483676, -70.120233],
            [-15.484674, -70.119805],
            [-15.483951, -70.117895],
            [-15.483134, -70.115651],
            [-15.481841, -70.111991],
            [-15.480384, -70.108224],
            [-15.481314, -70.107483],
            [-15.480280, -70.104500],
            [-15.479143, -70.101170],
            [-15.478078, -70.101503],
            [-15.477323, -70.099389]
        ];

        // 🔵 Dibujar la ruta
        var polyline18 = L.polyline(linea18Coords, {
            color: '#1E88E5',
            weight: 4,
            opacity: 0.9
        }).addTo(map);

        // 🔍 Ajustar mapa para que se vea toda la ruta
        map.fitBounds(polyline18.getBounds());
    </script>
@stop
