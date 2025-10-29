@extends('adminlte::page')

@section('title', 'Mapa General de Rutas - Juliaca')

@section('content_header')
    <h1 class="text-info">
        <i class="fas fa-map-marked-alt"></i> Mapa General de Rutas - Transporte Juliaca
        <small class="text-muted" style="font-size: 14px;">Vista combinada de todas las líneas activas</small>
    </h1>
@stop

@section('content')
<div class="card elevation-3" style="border-radius: 10px;">
    <div class="card-header bg-white">
        <strong><i class="fas fa-route text-info"></i> Rutas: Empresa Naranja, Línea 18, Línea 22 y Línea 55</strong>
    </div>
    <div class="card-body p-0">
        <div id="map" style="height: 600px; border-bottom-left-radius:10px; border-bottom-right-radius:10px;"></div>
    </div>
</div>

{{-- Leaflet base --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    // 🗺️ Inicializar mapa centrado en Juliaca
    var map = L.map('map').setView([-15.49, -70.13], 13);

    // 🌎 Capa satélite tipo Google Maps (Hybrid)
    L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0','mt1','mt2','mt3'],
        attribution: '© Google Maps'
    }).addTo(map);

    // === 🔶 EMPRESA NARANJA ===
    var coordsNaranja = {!! json_encode([
        [-15.514141, -70.178590],[-15.4939, -70.1164],[-15.439137, -70.099006]
    ]) !!}; // resumido, usa los tuyos completos
    var rutaNaranja = L.polyline(coordsNaranja, { color: '#ff9800', weight: 5, opacity: 0.9 }).addTo(map);
    L.marker(coordsNaranja[0]).bindPopup("<b>Empresa Naranja</b><br>Zona Norte").addTo(map);

    // === 🔵 LÍNEA 22 ===
    var coords22 = {!! json_encode([
        [-15.533118, -70.185676],[-15.473214, -70.124072],[-15.457271, -70.126224]
    ]) !!};
    var ruta22 = L.polyline(coords22, { color: '#1E88E5', weight: 4, opacity: 0.9 }).addTo(map);
    L.marker(coords22[0]).bindPopup("<b>Línea 22</b><br>Zona Sur-Este").addTo(map);

    // === 🟢 LÍNEA 55 ===
    var coords55 = {!! json_encode([
        [-15.533141, -70.185658],[-15.463085, -70.138861],[-15.411148, -70.149495]
    ]) !!};
    var ruta55 = L.polyline(coords55, { color: '#4CAF50', weight: 4, opacity: 0.9 }).addTo(map);
    L.marker(coords55[0]).bindPopup("<b>Línea 55</b><br>Zona Este").addTo(map);

    // === 🔷 LÍNEA 18 ===
    var coords18 = {!! json_encode([
        [-15.513593, -70.175983],[-15.493967, -70.130782],[-15.477323, -70.099389]
    ]) !!};
    var ruta18 = L.polyline(coords18, { color: '#3949ab', weight: 4, opacity: 0.9 }).addTo(map);
    L.marker(coords18[0]).bindPopup("<b>Línea 18</b><br>Zona Sur").addTo(map);

    // 🔍 Ajustar vista a todas las rutas
    var group = L.featureGroup([rutaNaranja, ruta18, ruta22, ruta55]);
    map.fitBounds(group.getBounds());

    // 📘 Leyenda de colores
    var legend = L.control({position: 'bottomright'});
    legend.onAdd = function () {
        var div = L.DomUtil.create('div', 'info legend');
        div.style.background = 'white';
        div.style.padding = '10px';
        div.style.borderRadius = '8px';
        div.style.boxShadow = '0 2px 6px rgba(0,0,0,0.3)';
        div.innerHTML = `
            <b>🚌 Rutas Activas</b><br>
            <span style="color:#ff9800;">⬤</span> Empresa Naranja<br>
            <span style="color:#3949ab;">⬤</span> Línea 18<br>
            <span style="color:#1E88E5;">⬤</span> Línea 22<br>
            <span style="color:#4CAF50;">⬤</span> Línea 55
        `;
        return div;
    };
    legend.addTo(map);
</script>
@stop
