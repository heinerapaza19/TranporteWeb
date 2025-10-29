@extends('adminlte::page')

@section('title', 'Mapa Línea 22')

@section('content_header')
    <h1 class="text-info">
        <i class="fas fa-bus"></i> Línea 22
        <small class="text-muted" style="font-size: 14px;">Ruta oficial</small>
    </h1>
@stop

@section('content')
    <div class="row">
        <!-- Panel izquierdo -->
        <div class="col-md-3">
            <div class="card elevation-3" style="border-radius: 10px;">
                <div class="card-header text-white"
                    style="background: linear-gradient(135deg, #00796B 0%, #00BCD4 100%);
                           border-top-left-radius:10px; border-top-right-radius:10px;">
                    <strong><i class="fas fa-route"></i> Línea 22</strong>
                </div>
                <div class="card-body">
                    <p class="mb-1"><strong>Código:</strong> 22</p>
                    <p class="mb-1"><strong>Puntos de ruta:</strong> Dibújalos manualmente</p>
                    <p class="mb-1"><strong>Cobertura:</strong> Zona Centro</p>
                    <hr>
                    <p class="text-muted mb-2" style="font-size: 14px;">
                        Usa el ícono de <strong>línea</strong> para trazar la ruta con el mouse.<br>
                        Las coordenadas aparecerán en la consola y en un popup.
                    </p>
                </div>
            </div>
        </div>

        <!-- Mapa -->
        <div class="col-md-9">
            <div class="card elevation-3" style="border-radius: 10px;">
                <div class="card-header bg-white">
                    <strong><i class="fas fa-map-marked-alt text-info"></i> Mapa de Ruta</strong>
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

    {{-- Leaflet Draw --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.css" />
    <script src="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.js"></script>

    <script>
        // 🗺️ Inicializar mapa centrado en Juliaca
        var map = L.map('map').setView([-15.4939, -70.1164], 16);

        // 🌎 Capa satélite tipo Google Maps
        var googleHybrid = L.tileLayer(
            'https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}',
            {
                maxZoom: 20,
                subdomains: ['mt0','mt1','mt2','mt3'],
                attribution: '© Google Maps'
            }
        ).addTo(map);

        // ➕ Grupo de dibujo
        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        // ✏️ Control de dibujo
        var drawControl = new L.Control.Draw({
            draw: {
                polyline: {
                    shapeOptions: {
                        color: '#00BCD4',
                        weight: 5
                    }
                },
                polygon: false,
                rectangle: false,
                circle: false,
                marker: false,
                circlemarker: false
            },
            edit: { featureGroup: drawnItems }
        });
        map.addControl(drawControl);

        // 📍 Evento cuando terminas de dibujar
        map.on(L.Draw.Event.CREATED, function (e) {
            var layer = e.layer;
            drawnItems.addLayer(layer);

            var coords = layer.getLatLngs();
            console.log('📍 Coordenadas de la Línea 22:');
            coords.forEach(c => console.log(`[${c.lat}, ${c.lng}]`));

            var texto = coords.map(c => `[${c.lat.toFixed(6)}, ${c.lng.toFixed(6)}]`).join('<br>');
            layer.bindPopup('<b>Ruta Línea 22</b><br>' + texto).openPopup();
        });

        // 🔹 Línea de ejemplo
        var linea22Coords = [
            [-15.5200, -70.1600],
            [-15.5150, -70.1500],
            [-15.5100, -70.1400],
            [-15.5050, -70.1300],
            [-15.5000, -70.1200],
            [-15.4950, -70.1150]
        ];

        var polyline22 = L.polyline(linea22Coords, {
            color: '#00BCD4',
            weight: 3,
            opacity: 0.7,
            dashArray: '5, 10'
        }).addTo(map);

        map.fitBounds(polyline22.getBounds());
    </script>
@stop
