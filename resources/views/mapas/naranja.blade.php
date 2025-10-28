@extends('adminlte::page')

@section('title', 'Mapa Empresa Naranja - Zona Norte')

@section('content_header')
    <h1 class="text-warning">
        <i class="fas fa-bus"></i> Empresa Naranja
        <small class="text-muted" style="font-size: 14px;">Ruta oficial - Zona Norte</small>
    </h1>
@stop

@section('content')
<div class="row">
    <!-- Panel izquierdo -->
    <div class="col-md-3">
        <div class="card elevation-3" style="border-radius: 10px;">
            <div class="card-header text-white"
                style="background: linear-gradient(135deg, #ff9800 0%, #ffb81d 100%);
                       border-top-left-radius:10px; border-top-right-radius:10px;">
                <strong><i class="fas fa-route"></i> Empresa Naranja</strong>
            </div>
            <div class="card-body">
                <p class="mb-1"><strong>Código:</strong> NAR</p>
                <p class="mb-1"><strong>Rutas:</strong> 12</p>
                <p class="mb-1"><strong>Cobertura:</strong> Zona Norte - Juliaca</p>
                <hr>
                <p class="text-muted mb-2" style="font-size: 14px;">
                    Vista satelital.  
                    La línea naranja muestra el recorrido real de la Empresa Naranja.
                </p>
            </div>
        </div>
    </div>

    <!-- Panel derecho: Mapa -->
    <div class="col-md-9">
        <div class="card elevation-3" style="border-radius: 10px;">
            <div class="card-header bg-white">
                <strong><i class="fas fa-map-marked-alt text-warning"></i> Mapa de Ruta</strong>
            </div>
            <div class="card-body p-0">
                <div id="map-naranja" style="height: 500px; border-bottom-left-radius:10px; border-bottom-right-radius:10px;"></div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
    .leaflet-popup-content-wrapper {
        background-color: #1e1e1e;
        color: #fff;
        font-size: 1rem;
        font-weight: 500;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.4);
    }
    .leaflet-popup-tip {
        background-color: #1e1e1e;
    }
    .leaflet-control-zoom-in, .leaflet-control-zoom-out {
        background-color: #333 !important;
        color: #fff !important;
        font-size: 18px !important;
        border-radius: 6px !important;
    }
</style>
@stop

@section('js')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    // Inicializar mapa satélite centrado en Juliaca
    var mapNaranja = L.map('map-naranja').setView([-15.4939, -70.1164], 13);

    var googleHybrid = L.tileLayer(
        'https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}',
        {
            maxZoom: 20,
            subdomains: ['mt0','mt1','mt2','mt3'],
            attribution: '© Google Maps'
        }
    ).addTo(mapNaranja);

    // Coordenadas reales Empresa Naranja
    var coordsNaranja = [
        [-15.514141, -70.178590],
        [-15.513955, -70.178440],
        [-15.513743, -70.176964],
        [-15.513687, -70.176208],
        [-15.513800, -70.175902],
        [-15.513645, -70.175795],
        [-15.513573, -70.174754],
        [-15.513340, -70.173337],
        [-15.513242, -70.172221],
        [-15.512193, -70.171170],
        [-15.510875, -70.169932],
        [-15.509686, -70.168285],
        [-15.508181, -70.166010],
        [-15.506631, -70.163832],
        [-15.503353, -70.159031],
        [-15.502619, -70.157373],
        [-15.501079, -70.153581],
        [-15.500779, -70.153356],
        [-15.500619, -70.153345],
        [-15.499952, -70.153672],
        [-15.498350, -70.154504],
        [-15.496768, -70.155400],
        [-15.494731, -70.156451],
        [-15.493894, -70.156816],
        [-15.493733, -70.156381],
        [-15.493392, -70.154825],
        [-15.492839, -70.153087],
        [-15.492343, -70.150936],
        [-15.492208, -70.149997],
        [-15.492255, -70.149020],
        [-15.492472, -70.147797],
        [-15.492623, -70.147385],
        [-15.491310, -70.147256],
        [-15.491362, -70.145335],
        [-15.491196, -70.144681],
        [-15.491496, -70.144219],
        [-15.491538, -70.144026],
        [-15.491248, -70.143822],
        [-15.490700, -70.143253],
        [-15.490617, -70.142856],
        [-15.491010, -70.141408],
        [-15.491445, -70.139051],
        [-15.491765, -70.137002],
        [-15.492117, -70.135360],
        [-15.492131, -70.134994],
        [-15.492172, -70.134833],
        [-15.491738, -70.134736],
        [-15.491040, -70.134559],
        [-15.490828, -70.133980],
        [-15.490590, -70.133320],
        [-15.489991, -70.133604],
        [-15.489510, -70.133733],
        [-15.488776, -70.134082],
        [-15.487850, -70.134436],
        [-15.487788, -70.134484],
        [-15.487623, -70.133910],
        [-15.487173, -70.132729],
        [-15.486682, -70.131270],
        [-15.486046, -70.129500],
        [-15.485695, -70.128519],
        [-15.485188, -70.127032],
        [-15.484511, -70.124902],
        [-15.484526, -70.124784],
        [-15.484842, -70.124747],
        [-15.484986, -70.124602],
        [-15.484650, -70.124344],
        [-15.484108, -70.123679],
        [-15.482557, -70.122220],
        [-15.480768, -70.120444],
        [-15.478545, -70.118099],
        [-15.475526, -70.115159],
        [-15.473396, -70.113077],
        [-15.472481, -70.112157],
        [-15.469528, -70.110269],
        [-15.467161, -70.108981],
        [-15.464694, -70.107785],
        [-15.463846, -70.107157],
        [-15.463883, -70.106948],
        [-15.464012, -70.106636],
        [-15.464762, -70.105441],
        [-15.465056, -70.104733],
        [-15.464844, -70.104191],
        [-15.464560, -70.103767],
        [-15.463490, -70.102522],
        [-15.462161, -70.100983],
        [-15.461711, -70.100736],
        [-15.460899, -70.100779],
        [-15.459147, -70.100864],
        [-15.458568, -70.100860],
        [-15.457244, -70.101675],
        [-15.456923, -70.101777],
        [-15.456515, -70.101498],
        [-15.455677, -70.100704],
        [-15.454871, -70.100565],
        [-15.454152, -70.100430],
        [-15.452110, -70.100237],
        [-15.450197, -70.100103],
        [-15.447658, -70.099830],
        [-15.444027, -70.099626],
        [-15.439125, -70.099068],
        [-15.439137, -70.099006]
    ];

    // Dibujar la ruta
    var polyNaranja = L.polyline(coordsNaranja, {
        color: '#ff9800',
        weight: 5,
        opacity: 0.9
    }).addTo(mapNaranja);

    // Ajustar vista al recorrido
    mapNaranja.fitBounds(polyNaranja.getBounds());

    // Popup inicial
    L.marker(coordsNaranja[0]).addTo(mapNaranja)
        .bindPopup("<b>Empresa Naranja</b><br>Inicio de ruta - Zona Norte.")
        .openPopup();

    // Mantener el mapa estable
    mapNaranja.on('zoomend', () => mapNaranja.invalidateSize());
    window.addEventListener('resize', () => mapNaranja.invalidateSize());
</script>
@stop
