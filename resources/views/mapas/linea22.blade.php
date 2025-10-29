@extends('adminlte::page')

@section('title', 'Mapa Línea 22')

@section('content_header')
    <h1 class="text-primary">
        <i class="fas fa-bus"></i> Línea 22
        <small class="text-muted" style="font-size: 14px;">Ruta oficial - San Román</small>
    </h1>
@stop

@section('content')
<div class="row">
    <!-- Panel izquierdo -->
    <div class="col-md-3">
        <div class="card elevation-3" style="border-radius: 10px;">
            <div class="card-header text-white"
                style="background: linear-gradient(135deg, #1565C0 0%, #1E88E5 100%);
                       border-top-left-radius:10px; border-top-right-radius:10px;">
                <strong><i class="fas fa-route"></i> Línea 22</strong>
            </div>
            <div class="card-body">
                <p class="mb-1"><strong>Código:</strong> 22</p>
                <p class="mb-1"><strong>Cobertura:</strong> Zona Sur-Este</p>
                <hr>
                <p class="text-muted mb-2" style="font-size: 14px;">
                    Mapa satelital con el recorrido completo de la Línea 22 en Juliaca.
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

    // 🚍 Coordenadas reales Línea 22 (corregidas)
    var linea22Coords = [
        [-15.533118, -70.185676],
        [-15.530901, -70.185059],
        [-15.528441, -70.184200],
        [-15.526167, -70.183470],
        [-15.521370, -70.179372],
        [-15.516698, -70.175079],
        [-15.513286, -70.172074],
        [-15.513354, -70.173538],
        [-15.513623, -70.175481],
        [-15.513571, -70.175846],
        [-15.513664, -70.176114],
        [-15.513767, -70.175932],
        [-15.513623, -70.175599],
        [-15.513519, -70.174407],
        [-15.513364, -70.173162],
        [-15.513302, -70.172336],
        [-15.512909, -70.171799],
        [-15.510738, -70.169740],
        [-15.509570, -70.168194],
        [-15.508309, -70.166134],
        [-15.507182, -70.164513],
        [-15.506551, -70.163772],
        [-15.504939, -70.161304],
        [-15.503853, -70.159823],
        [-15.503212, -70.158674],
        [-15.502571, -70.157247],
        [-15.501010, -70.153410],
        [-15.500948, -70.152884],
        [-15.499397, -70.149130],
        [-15.499004, -70.148056],
        [-15.498818, -70.147530],
        [-15.498157, -70.146297],
        [-15.493266, -70.144440],
        [-15.491364, -70.143958],
        [-15.490619, -70.143132],
        [-15.491891, -70.136628],
        [-15.492067, -70.135640],
        [-15.492191, -70.134824],
        [-15.492429, -70.133901],
        [-15.492553, -70.133408],
        [-15.494641, -70.132538],
        [-15.494052, -70.130960],
        [-15.492708, -70.127290],
        [-15.491653, -70.124531],
        [-15.489730, -70.125227],
        [-15.488831, -70.125495],
        [-15.485915, -70.126536],
        [-15.483248, -70.127481],
        [-15.482607, -70.127760],
        [-15.482389, -70.127953],
        [-15.480539, -70.126837],
        [-15.480228, -70.127532],
        [-15.480146, -70.128552],
        [-15.478998, -70.127854],
        [-15.476460, -70.126187],
        [-15.473214, -70.124072],
        [-15.473079, -70.124405],
        [-15.473110, -70.125897],
        [-15.473172, -70.126573],
        [-15.470422, -70.126874],
        [-15.467578, -70.127389],
        [-15.465081, -70.127802],
        [-15.464869, -70.126679],
        [-15.463907, -70.126900],
        [-15.462501, -70.127136],
        [-15.460208, -70.127470],
        [-15.458889, -70.127738],
        [-15.458522, -70.127481],
        [-15.458657, -70.126627],
        [-15.457907, -70.126380],
        [-15.457457, -70.126321],
        [-15.457271, -70.126224]
    ];

    // 🔵 Dibujar la ruta (azul)
    var polyline22 = L.polyline(linea22Coords, {
        color: '#1E88E5',
        weight: 4,
        opacity: 0.9
    }).addTo(map);

    // 🔍 Ajustar mapa a la ruta completa
    map.fitBounds(polyline22.getBounds());
</script>
@stop
