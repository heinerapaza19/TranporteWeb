@extends('adminlte::page')

@section('title', 'Mapa Línea 18')

@section('content_header')
    <h1 class="text-primary">
        <i class="fas fa-bus"></i> Línea 18
        <small class="text-muted" style="font-size: 14px;">Ruta oficial</small>
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
                    <p class="mb-1"><strong>Puntos de ruta:</strong> Dibújalos manualmente</p>
                    <p class="mb-1"><strong>Cobertura:</strong> Zona Sur</p>
                    <hr>
                    <p class="text-muted mb-2" style="font-size: 14px;">
                        Usa el ícono de <strong>línea</strong> para trazar la ruta con el mouse.  
                        Las coordenadas aparecerán en la consola y en un popup.
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

    {{-- Leaflet Draw --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.css" />
    <script src="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.js"></script>

    <script>
        // 🗺️ Inicializar mapa centrado en Juliaca
        var map = L.map('map').setView([-15.4939, -70.1164], 16);

        // 🌎 Capa satélite con claridad tipo Google Maps (Google Hybrid vía Leaflet)
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

        // ✏️ Control para trazar líneas
        var drawControl = new L.Control.Draw({
            draw: {
                polyline: {
                    shapeOptions: {
                        color: '#00b0ff',
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

        // 📍 Evento al terminar de dibujar
        map.on(L.Draw.Event.CREATED, function (e) {
            var layer = e.layer;
            drawnItems.addLayer(layer);

            var coords = layer.getLatLngs();
            console.log('📍 Coordenadas de la Línea 18:');
            coords.forEach(c => console.log(`[${c.lat}, ${c.lng}]`));

            var texto = coords.map(c => `[${c.lat.toFixed(6)}, ${c.lng.toFixed(6)}]`).join('<br>');
            layer.bindPopup('<b>Ruta Línea 18</b><br>' + texto).openPopup();
        });

        // 🧭 Línea de ejemplo
        var linea18Coords = [
            [-15.5000, -70.1300],
            [-15.4970, -70.1250],
            [-15.4945, -70.1200],
            [-15.4930, -70.1164],
            [-15.4915, -70.1120]
        ];
        var polyline18 = L.polyline(linea18Coords, {
            color: '#42a5f5',
            weight: 3,
            opacity: 0.7,
            dashArray: '5, 10'
        }).addTo(map);

        map.fitBounds(polyline18.getBounds());
    </script>
@stop
