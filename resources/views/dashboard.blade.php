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
    {{-- ==== GRÁFICO Y MAPAS ==== --}}
    <div class="row mt-4">
        <!-- 📊 Gráfico de viajes (IZQUIERDA) -->
        <div class="col-lg-7">
            <div class="card card-info card-outline elevation-3">
                <div class="card-header border-0 d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">
                        <i class="fas fa-route"></i> Mapa General de Rutas
                    </h3>
                    <button class="btn btn-tool btn-sm"><i class="fas fa-bars"></i></button>
                </div>

                <div class="card-body p-0">
                    <div id="map" style="height: 400px;"></div>
                </div>

                <div class="card-footer text-center text-muted small">
                    <i class="fas fa-info-circle"></i> Mapa combinado de todas las rutas activas
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

    

    <!-- 💬 BOTÓN FLOTANTE -->
    <button id="chatbotButton">
        <i class="fas fa-robot"></i>
    </button>

    <!-- 🪟 CHAT FLOTANTE -->
    <div id="chatContainer">
        <div id="chatHeader">
            <span>Asistente Virtual</span>
            <button id="closeChat">✕</button>
        </div>

        <div id="chatBody">
            <p><strong>🤖 Bot:</strong> ¡Hola! Soy tu asistente del transporte. ¿En qué puedo ayudarte?</p>
        </div>

        <div id="chatFooter">
            <input type="text" id="chatInput" placeholder="Escribe tu mensaje...">
            <button id="sendBtn"><i class="fas fa-paper-plane"></i></button>
        </div>
    </div>



    <!-- 🔹 Modal ChatBot -->
    <div class="modal fade" id="chatBotModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg" style="border-radius: 15px;">
                <div class="modal-header bg-gradient-warning text-white">
                    <h5 class="modal-title"><i class="fas fa-robot"></i> Asistente Virtual</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="max-height:400px; overflow-y:auto;" id="chatbotMessages">
                    <div class="text-muted"><em>👋 ¡Hola! Soy tu asistente del transporte. Pregúntame lo que
                            quieras.</em></div>
                </div>
                <div class="modal-footer p-2">
                    <input type="text" id="chatbotInput" class="form-control" placeholder="Escribe tu pregunta...">
                    <button id="chatbotSend" class="btn btn-dark"><i class="fas fa-paper-plane"></i></button>
                </div>
            </div>
        </div>
    </div>

    {{-- ==== SCRIPT DEL MAPA ==== --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>



@stop

{{-- 🔹 Scripts del ChatBot --}}
@section('js')
    <script>

     // 🗺️ Inicializar mapa en Juliaca
    var map = L.map('map').setView([-15.49, -70.13], 13);

    // 🌎 Capa satélite tipo Google Maps
    L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0','mt1','mt2','mt3'],
        attribution: '© Google Maps'
    }).addTo(map);

    // === 🟧 EMPRESA NARANJA ===
    var coordsNaranja = [
        [-15.514141, -70.178590],
        [-15.4939, -70.1164],
        [-15.439137, -70.099006]
    ];
    var rutaNaranja = L.polyline(coordsNaranja, { color: '#ff9800', weight: 4 }).addTo(map);

    // === 🔷 LÍNEA 18 ===
    var coords18 = [
        [-15.513593, -70.175983],
        [-15.493967, -70.130782],
        [-15.477323, -70.099389]
    ];
    var ruta18 = L.polyline(coords18, { color: '#3949ab', weight: 4 }).addTo(map);

    // === 🔵 LÍNEA 22 ===
    var coords22 = [
        [-15.533118, -70.185676],
        [-15.473214, -70.124072],
        [-15.457271, -70.126224]
    ];
    var ruta22 = L.polyline(coords22, { color: '#1E88E5', weight: 4 }).addTo(map);

    // === 🟢 LÍNEA 55 ===
    var coords55 = [
        [-15.533141, -70.185658],
        [-15.463085, -70.138861],
        [-15.411148, -70.149495]
    ];
    var ruta55 = L.polyline(coords55, { color: '#4CAF50', weight: 4 }).addTo(map);

    // 🔍 Ajustar vista para ver todas las rutas
    var group = L.featureGroup([rutaNaranja, ruta18, ruta22, ruta55]);
    map.fitBounds(group.getBounds());

    // 🧭 Leyenda
    var legend = L.control({position: 'bottomright'});
    legend.onAdd = function () {
        var div = L.DomUtil.create('div', 'info legend');
        div.style.background = 'white';
        div.style.padding = '10px';
        div.style.borderRadius = '8px';
        div.style.fontSize = '13px';
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
        document.addEventListener('DOMContentLoaded', () => {
            const sendBtn = document.getElementById('chatbotSend');
            const input = document.getElementById('chatbotInput');
            const messages = document.getElementById('chatbotMessages');

            function addMessage(who, text, color = 'black') {
                const msg = document.createElement('div');
                msg.classList.add('mt-2');
                msg.innerHTML = `<strong style="color:${color}">${who}:</strong> ${text}`;
                messages.appendChild(msg);
                messages.scrollTop = messages.scrollHeight;
            }

            async function sendMessage() {
                const text = input.value.trim();
                if (!text) return;
                addMessage('Tú', text, '#007bff');
                input.value = '';

                const response = await fetch('{{ route('chatbot.store') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        mensaje: text
                    })
                });

                const data = await response.json();
                addMessage('Bot 🤖', data.respuesta, '#28a745');
            }

            sendBtn.addEventListener('click', sendMessage);
            input.addEventListener('keypress', e => {
                if (e.key === 'Enter') sendMessage();
            });
        });

        const chatButton = document.getElementById('chatbotButton');
        const chatContainer = document.getElementById('chatContainer');
        const closeChat = document.getElementById('closeChat');

        chatButton.addEventListener('click', () => {
            chatContainer.style.display = 'flex';
            chatButton.style.display = 'none';
        });

        closeChat.addEventListener('click', () => {
            chatContainer.style.display = 'none';
            chatButton.style.display = 'flex';
        });

        document.getElementById('sendBtn').addEventListener('click', () => {
            const input = document.getElementById('chatInput');
            const message = input.value.trim();
            if (message) {
                const chatBody = document.getElementById('chatBody');
                chatBody.innerHTML += `<p><strong>Tú:</strong> ${message}</p>`;
                input.value = '';
                chatBody.scrollTop = chatBody.scrollHeight;
            }
        });
    </script>
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

        .card-title,
        .card-title i {
            color: #fff !important;
        }

        .content-wrapper,
        .main-footer,
        .main-header {
            background-color: #454D55 !important;
        }

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

        /* --- BOTÓN FLOTANTE --- */
        #chatbotButton {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #ffb300 0%, #ff9800 100%);
            color: white;
            border: none;
            border-radius: 50%;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            font-size: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        #chatbotButton:hover {
            transform: scale(1.1);
            background: linear-gradient(135deg, #ffa000 0%, #ff6f00 100%);
        }

        /* --- CONTENEDOR DEL CHAT --- */
        #chatContainer {
            position: fixed;
            bottom: 110px;
            right: 30px;
            width: 380px;
            height: 520px;
            background: #2B3D4F;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
            display: none;
            flex-direction: column;
            overflow: hidden;
            z-index: 1001;
        }

        /* --- CABECERA DEL CHAT --- */
        #chatHeader {
            background: linear-gradient(135deg, #ff9800 0%, #ff6f00 100%);
            color: white;
            padding: 15px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #chatHeader button {
            background: transparent;
            border: none;
            color: white;
            font-size: 18px;
            cursor: pointer;
            font-weight: bold;
        }

        /* --- MENSAJES --- */
        #chatBody {
            flex: 1;
            background: #344A63;
            color: #fff;
            padding: 15px;
            overflow-y: auto;
            font-size: 14px;
        }

        /* --- INPUT --- */
        #chatFooter {
            display: flex;
            padding: 10px;
            background: #2B3D4F;
        }

        #chatInput {
            flex: 1;
            border: none;
            border-radius: 20px;
            padding: 10px 15px;
            outline: none;
            font-size: 14px;
        }

        #sendBtn {
            background: #ff9800;
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            margin-left: 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.3s;
        }

        #sendBtn:hover {
            background: #ff6f00;
            transform: scale(1.1);
        }

        #chatContainer {
            position: fixed;
            bottom: 110px;
            right: 30px;
            width: 380px;
            height: 420px;
            background: #2B3D4F;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
            display: none;
            flex-direction: column;
            overflow: hidden;
            z-index: 1001;
        }

        #chatHeader {
            background: linear-gradient(135deg, #ff9800 0%, #ff6f00 100%);
            color: white;
            padding: 15px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #chatHeader button {
            background: transparent;
            border: none;
            color: white;
            font-size: 18px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        #chatHeader button:hover {
            color: #ffd180;
        }

        #chatBody {
            background: #344A63;
            color: #E0E0E0;
        }
    </style>
@stop

@section('footer')
    <footer class="bg-dark text-white py-4">
    <div class="container text-center">
        <h4>Transporte Público Juliaca</h4>
        <p>
            Nos dedicamos a mejorar el transporte urbano de Juliaca con rutas seguras,
            conductores capacitados y un servicio eficiente para todos los ciudadanos.
        </p>

        <div class="mt-3">
            <a href="https://www.facebook.com/RuterosRegionPuno/" target="_blank" class="social-icon mx-2 text-white">
                <i class="fab fa-facebook-f fa-lg"></i>
            </a>
            <a href="https://www.instagram.com/reel/DOdtwj8DS0B/" target="_blank" class="social-icon mx-2 text-white">
                <i class="fab fa-instagram fa-lg"></i>
            </a>
            <a href="https://wa.me/51949123456" target="_blank" class="social-icon mx-2 text-white">
                <i class="fab fa-whatsapp fa-lg"></i>
            </a>
        </div>

        <hr class="bg-light">

        <p class="mb-0">
            © 2025 <strong>Transporte Público Juliaca</strong> — Desarrollado por <strong>Heiner Apaza</strong>.
        </p>
    </div>
</footer>

@stop
