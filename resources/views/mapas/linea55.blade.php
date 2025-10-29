@extends('adminlte::page')

@section('title', 'Mapa Línea 55')

@section('content_header')
    <h1 class="text-success">
        <i class="fas fa-bus"></i> Línea 55
        <small class="text-muted" style="font-size: 14px;">Ruta oficial - San Román</small>
    </h1>
@stop

@section('content')
<div class="row">
    <!-- Panel izquierdo -->
    <div class="col-md-3">
        <div class="card elevation-3" style="border-radius: 10px;">
            <div class="card-header text-white"
                style="background: linear-gradient(135deg, #1B5E20 0%, #66BB6A 100%);
                       border-top-left-radius:10px; border-top-right-radius:10px;">
                <strong><i class="fas fa-route"></i> Línea 55</strong>
            </div>
            <div class="card-body">
                <p class="mb-1"><strong>Código:</strong> 55</p>
                <p class="mb-1"><strong>Cobertura:</strong> Zona Este</p>
                <hr>
                <p class="text-muted mb-2" style="font-size: 14px;">
                    Mapa satelital con el recorrido completo de la Línea 55 en Juliaca.
                </p>
            </div>
        </div>
    </div>

    <!-- Mapa -->
    <div class="col-md-9">
        <div class="card elevation-3" style="border-radius: 10px;">
            <div class="card-header bg-white">
                <strong><i class="fas fa-map-marked-alt text-success"></i> Mapa de Ruta</strong>
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
    var map = L.map('map').setView([-15.49, -70.13], 13);

    // 🌎 Capa satélite tipo Google Maps (Hybrid)
    var googleHybrid = L.tileLayer(
        'https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}',
        {
            maxZoom: 20,
            subdomains: ['mt0','mt1','mt2','mt3'],
            attribution: '© Google Maps'
        }
    ).addTo(map);

    // 🚍 Coordenadas reales Línea 55 (corregidas)
    var linea55Coords = [
        [-15.533141, -70.185658],
        [-15.532511, -70.185473],
        [-15.531127, -70.185143],
        [-15.530362, -70.184805],
        [-15.529220, -70.184440],
        [-15.528563, -70.184204],
        [-15.527261, -70.183769],
        [-15.526413, -70.183490],
        [-15.526046, -70.183447],
        [-15.525090, -70.182626],
        [-15.523245, -70.180985],
        [-15.521668, -70.179590],
        [-15.521022, -70.178983],
        [-15.519311, -70.177477],
        [-15.518634, -70.176902],
        [-15.516975, -70.175400],
        [-15.516076, -70.174665],
        [-15.514566, -70.173244],
        [-15.513693, -70.172525],
        [-15.513253, -70.172128],
        [-15.513284, -70.172879],
        [-15.513352, -70.173513],
        [-15.513522, -70.174817],
        [-15.513620, -70.175740],
        [-15.513569, -70.176003],
        [-15.513703, -70.176137],
        [-15.513812, -70.175874],
        [-15.513677, -70.175627],
        [-15.513543, -70.174613],
        [-15.513424, -70.173485],
        [-15.513352, -70.172847],
        [-15.513290, -70.172498],
        [-15.513248, -70.172219],
        [-15.512933, -70.171865],
        [-15.512457, -70.171414],
        [-15.511088, -70.170176],
        [-15.509997, -70.168732],
        [-15.509180, -70.167530],
        [-15.508400, -70.166414],
        [-15.507231, -70.164773],
        [-15.506565, -70.163721],
        [-15.504879, -70.161222],
        [-15.504052, -70.160041],
        [-15.503127, -70.158603],
        [-15.502460, -70.156805],
        [-15.501328, -70.154189],
        [-15.501065, -70.153240],
        [-15.500553, -70.151797],
        [-15.499653, -70.149757],
        [-15.499043, -70.148228],
        [-15.498940, -70.147632],
        [-15.498516, -70.146908],
        [-15.498206, -70.146346],
        [-15.497379, -70.146083],
        [-15.495859, -70.145466],
        [-15.493254, -70.144414],
        [-15.491418, -70.143922],
        [-15.491108, -70.143589],
        [-15.490602, -70.142982],
        [-15.490881, -70.141909],
        [-15.491041, -70.140938],
        [-15.491491, -70.138764],
        [-15.490436, -70.138539],
        [-15.488606, -70.138149],
        [-15.488818, -70.137167],
        [-15.489149, -70.135869],
        [-15.489392, -70.134849],
        [-15.489356, -70.134634],
        [-15.490839, -70.134055],
        [-15.490560, -70.133384],
        [-15.488735, -70.134114],
        [-15.487076, -70.134790],
        [-15.485546, -70.135300],
        [-15.484253, -70.135418],
        [-15.483069, -70.135585],
        [-15.481472, -70.135805],
        [-15.479937, -70.136009],
        [-15.477326, -70.136556],
        [-15.475459, -70.136878],
        [-15.473805, -70.137066],
        [-15.471163, -70.137495],
        [-15.467911, -70.138085],
        [-15.463085, -70.138861],
        [-15.462102, -70.139130],
        [-15.459217, -70.139580],
        [-15.453706, -70.140482],
        [-15.446451, -70.141563],
        [-15.439150, -70.139846],
        [-15.438095, -70.139696],
        [-15.434227, -70.141156],
        [-15.426781, -70.143796],
        [-15.411148, -70.149495]
    ];

    // 🟢 Dibujar la ruta
    var polyline55 = L.polyline(linea55Coords, {
        color: '#4CAF50',
        weight: 4,
        opacity: 0.9
    }).addTo(map);

    // 🔍 Ajustar vista al recorrido completo
    map.fitBounds(polyline55.getBounds());
</script>
@stop
