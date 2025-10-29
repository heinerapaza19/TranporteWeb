

@extends('adminlte::page')

@section('title', 'Chat Bot - Asistente Virtual')

@section('content_header')
    <h1 class="text-warning"><i class="fas fa-robot"></i> Asistente Virtual del Transporte</h1>
@stop

@section('content')
<style>
    :root {
        --chat-orange: #ff9800;
        --chat-orange-dark: #ff6f00;
        --chat-bg: #f5f5f5;
        --chat-gray: #2c3e50;
        --chat-light: #ecf0f1;
    }

    .chat-container {
        height: calc(100vh - 200px);
        max-height: 900px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        display: flex;
        overflow: hidden;
    }

    .chat-window {
        display: none;
        flex-direction: column;
        flex: 1;
        position: relative;
        height: 100%;
        overflow: hidden;
    }

    .chat-window.active {
        display: flex;
    }

    .welcome-view {
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .chat-messages {
        flex: 1;
        overflow-y: auto;
        overflow-x: hidden;
        padding: 20px;
        background: #f8f9fa;
        min-height: 0;
        max-height: 100%;
        scroll-behavior: smooth;
        -webkit-overflow-scrolling: touch;
    }

    .message {
        margin-bottom: 20px;
        display: flex;
        align-items: flex-start;
        gap: 10px;
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .message.user {
        justify-content: flex-end;
    }

    .message-avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        flex-shrink: 0;
    }

    .message.user .message-avatar {
        background: var(--chat-orange);
        color: white;
        order: 2;
    }

    .message.bot .message-avatar {
        background: var(--chat-gray);
        color: white;
    }

    .message-content {
        max-width: 70%;
        padding: 12px 16px;
        border-radius: 18px;
        word-wrap: break-word;
        line-height: 1.5;
    }

    .message.user .message-content {
        background: var(--chat-orange);
        color: white;
        border-bottom-right-radius: 4px;
        text-align: right;
    }

    .message.bot .message-content {
        background: white;
        color: var(--chat-gray);
        border-bottom-left-radius: 4px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .message-content strong {
        font-weight: 600;
    }

    .typing-indicator {
        display: flex;
        gap: 5px;
        padding: 10px;
    }

    .typing-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: var(--chat-orange);
        animation: typing 1.4s infinite;
    }

    .typing-dot:nth-child(2) {
        animation-delay: 0.2s;
    }

    .typing-dot:nth-child(3) {
        animation-delay: 0.4s;
    }

    @keyframes typing {
        0%, 60%, 100% { transform: translateY(0); }
        30% { transform: translateY(-10px); }
    }

    .chat-sidebar {
        width: 280px;
        background: var(--chat-gray);
        color: white;
        padding: 20px;
        overflow-y: auto;
    }

    .chat-sidebar h3 {
        color: var(--chat-orange);
        font-size: 18px;
        margin-bottom: 15px;
        border-bottom: 2px solid var(--chat-orange);
        padding-bottom: 10px;
    }

    .chat-sidebar .search-box {
        width: 100%;
        padding: 8px 12px;
        border: none;
        border-radius: 8px;
        margin-bottom: 20px;
        background: rgba(255,255,255,0.1);
        color: white;
    }

    .chat-sidebar .search-box::placeholder {
        color: rgba(255,255,255,0.6);
    }

    .chat-section {
        margin-bottom: 20px;
    }

    .chat-section .section-title {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
        font-size: 12px;
        color: rgba(255,255,255,0.6);
        text-transform: uppercase;
    }

    .chat-item {
        padding: 10px;
        margin-bottom: 8px;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s;
        background: rgba(255,255,255,0.05);
    }

    .chat-item:hover {
        background: var(--chat-orange);
        transform: translateX(5px);
    }

    .chat-item.active {
        background: var(--chat-orange);
    }

    .chat-item .item-title {
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 3px;
    }

    .chat-item .item-desc {
        font-size: 11px;
        color: rgba(255,255,255,0.7);
    }

    .chat-main {
        flex: 1;
        display: flex;
        flex-direction: column;
        background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
    }

    .chat-header {
        padding: 20px;
        background: linear-gradient(135deg, var(--chat-orange) 0%, var(--chat-orange-dark) 100%);
        color: white;
        text-align: center;
    }

    .chat-header h2 {
        font-size: 28px;
        margin: 0;
        font-weight: bold;
    }

    .chat-categories {
        padding: 30px;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        overflow-y: auto;
        flex: 1;
    }

    .category-card {
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        cursor: pointer;
        transition: all 0.3s;
        border-left: 4px solid var(--chat-orange);
    }

    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(255,152,0,0.2);
    }

    .category-card .card-title {
        font-size: 16px;
        font-weight: bold;
        color: var(--chat-gray);
        margin-bottom: 8px;
    }

    .category-card .card-desc {
        font-size: 13px;
        color: #7f8c8d;
    }

    .chat-input-area {
        padding: 15px 20px;
        background: white;
        border-top: 1px solid #e0e0e0;
        position: sticky;
        bottom: 0;
        z-index: 10;
        flex-shrink: 0;
        box-shadow: 0 -2px 10px rgba(0,0,0,0.05);
    }

    .chat-input-wrapper {
        display: flex;
        gap: 10px;
        align-items: center;
        background: var(--chat-light);
        border-radius: 50px;
        padding: 5px 20px;
        border: 2px solid transparent;
        transition: all 0.3s;
    }

    .chat-input-wrapper:focus-within {
        border-color: var(--chat-orange);
        box-shadow: 0 0 0 3px rgba(255,152,0,0.1);
    }

    .chat-input {
        flex: 1;
        border: none;
        background: transparent;
        padding: 15px 10px;
        font-size: 15px;
        outline: none;
        color: var(--chat-gray);
    }

    .chat-input::placeholder {
        color: #95a5a6;
    }

    .send-btn {
        background: var(--chat-orange);
        color: white;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .send-btn:hover {
        background: var(--chat-orange-dark);
        transform: scale(1.1);
    }

    .chat-footer {
        padding: 15px;
        background: var(--chat-gray);
        color: rgba(255,255,255,0.6);
        text-align: center;
        font-size: 12px;
    }
</style>

<div class="chat-container">
    <!-- Sidebar izquierdo -->
    <div class="chat-sidebar">
        <div class="text-center mb-4">
            <i class="fas fa-robot fa-3x text-warning"></i>
            <h4 class="mt-3 mb-0">Transporte Bot</h4>
        </div>

        <input type="text" class="chat-sidebar search-box" placeholder="Buscar conversaciones...">

        <div class="chat-section">
            <div class="section-title">
                <span>Recientes</span>
                <a href="#" style="color: var(--chat-orange); font-size: 11px;">Ver todas</a>
            </div>
            <div class="chat-item active">
                <div class="item-title">Horarios de Ruta</div>
                <div class="item-desc">Consulta horarios de transporte</div>
            </div>
            <div class="chat-item">
                <div class="item-title">Rutas Disponibles</div>
                <div class="item-desc">Ver todas las rutas</div>
            </div>
            <div class="chat-item">
                <div class="item-title">Preguntas Frecuentes</div>
                <div class="item-desc">Sobre el transporte público</div>
            </div>
        </div>

        <div class="chat-section">
            <div class="section-title">
                <span>Favoritos</span>
                <a href="#" style="color: var(--chat-orange); font-size: 11px;">Ver todas</a>
            </div>
            <div class="chat-item">
                <div class="item-title">Estados de Paradas</div>
                <div class="item-desc">Ubicación de paraderos</div>
            </div>
            <div class="chat-item">
                <div class="item-title">Tarifas</div>
                <div class="item-desc">Precios por ruta</div>
            </div>
            <div class="chat-item">
                <div class="item-title">Empresas</div>
                <div class="item-desc">Información de empresas</div>
            </div>
            <div class="chat-item">
                <div class="item-title">Reportes</div>
                <div class="item-desc">Reportar problemas</div>
            </div>
        </div>
    </div>

    <!-- Área principal -->
    <div class="chat-main">
        <!-- Vista de bienvenida -->
        <div id="welcomeView" class="welcome-view">
            <div class="chat-header">
                <h2>Asistente Virtual de Transporte</h2>
                <p style="margin: 5px 0 0 0; opacity: 0.9; font-size: 14px;">¿En qué puedo ayudarte hoy?</p>
            </div>

            <div class="chat-categories">
                <div class="category-card" onclick="startChat('¿Cuáles son los horarios de las rutas?')">
                    <div class="card-title"><i class="fas fa-clock text-warning"></i> Horarios</div>
                    <div class="card-desc">Consulta los horarios de salida y llegada de las rutas</div>
                </div>

                <div class="category-card" onclick="startChat('¿Qué rutas están disponibles?')">
                    <div class="card-title"><i class="fas fa-route text-warning"></i> Rutas</div>
                    <div class="card-desc">Explora todas las rutas disponibles por empresa</div>
                </div>

                <div class="category-card" onclick="startChat('¿Dónde están las paradas?')">
                    <div class="card-title"><i class="fas fa-map-marker-alt text-warning"></i> Paraderos</div>
                    <div class="card-desc">Ubicación de paradas y estaciones</div>
                </div>

                <div class="category-card" onclick="startChat('¿Cuánto cuesta el pasaje?')">
                    <div class="card-title"><i class="fas fa-money-bill text-warning"></i> Tarifas</div>
                    <div class="card-desc">Consulta los precios de los pasajes</div>
                </div>

                <div class="category-card" onclick="startChat('¿Cómo rastreo mi vehículo?')">
                    <div class="card-title"><i class="fas fa-satellite text-warning"></i> Rastreo GPS</div>
                    <div class="card-desc">Seguimiento en tiempo real de tu transporte</div>
                </div>

                <div class="category-card" onclick="startChat('¿Qué empresas de transporte hay?')">
                    <div class="card-title"><i class="fas fa-building text-warning"></i> Empresas</div>
                    <div class="card-desc">Información sobre las empresas registradas</div>
                </div>
            </div>
        </div>

        <!-- Ventana de chat -->
        <div id="chatWindow" class="chat-window">
            <div class="chat-header">
                <button onclick="backToWelcome()" style="position: absolute; left: 20px; background: none; border: none; color: white; font-size: 20px; cursor: pointer;">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <h2 style="margin: 0;">Transporte Bot</h2>
                <p style="margin: 5px 0 0 0; opacity: 0.9; font-size: 14px;">En línea</p>
            </div>

            <div class="chat-messages" id="chatMessages">
                <!-- Los mensajes se agregan aquí dinámicamente -->
            </div>

            <div class="chat-input-area">
                <form id="chatForm" onsubmit="sendMessage(event)">
                    <div class="chat-input-wrapper">
                        <input type="text" id="chatInput" class="chat-input" placeholder="Pregunta lo que quieras..." required autocomplete="off">
                        <button type="submit" class="send-btn" id="sendBtn">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Cambiar a vista de chat
function startChat(question) {
    document.getElementById('welcomeView').style.display = 'none';
    document.getElementById('chatWindow').classList.add('active');

    // Inicializar scroll después de mostrar la ventana
    setTimeout(() => {
        scrollToBottomSmooth();
    }, 100);

    if (question) {
        addUserMessage(question);
        sendMessageToAI(question);
    }
}

// Volver a vista de bienvenida
function backToWelcome() {
    document.getElementById('welcomeView').style.display = 'flex';
    document.getElementById('chatWindow').classList.remove('active');
    document.getElementById('chatMessages').innerHTML = '';
}

// Enviar mensaje
function sendMessage(e) {
    e.preventDefault();
    const input = document.getElementById('chatInput');
    const message = input.value.trim();

    if (!message) return;

    addUserMessage(message);
    input.value = '';
    sendMessageToAI(message);
}

// Agregar mensaje del usuario
function addUserMessage(message) {
    const messagesDiv = document.getElementById('chatMessages');
    const messageHTML = `
        <div class="message user">
            <div class="message-content">${escapeHtml(message)}</div>
            <div class="message-avatar">👤</div>
        </div>
    `;
    messagesDiv.insertAdjacentHTML('beforeend', messageHTML);
    scrollToBottomSmooth();
}

// Agregar mensaje del bot
function addBotMessage(message) {
    const messagesDiv = document.getElementById('chatMessages');

    // Remover indicador de escritura si existe
    const typingIndicator = messagesDiv.querySelector('.typing-indicator');
    if (typingIndicator) {
        typingIndicator.remove();
    }

    const messageHTML = `
        <div class="message bot">
            <div class="message-avatar">🤖</div>
            <div class="message-content">${formatMessage(message)}</div>
        </div>
    `;
    messagesDiv.insertAdjacentHTML('beforeend', messageHTML);

    // Scroll suave al final - múltiples intentos
    scrollToBottomSmooth();

    // Scroll adicional después de un momento para asegurar que el contenido se renderizó
    setTimeout(scrollToBottomSmooth, 300);
}

// Mostrar indicador de escritura
function showTypingIndicator() {
    const messagesDiv = document.getElementById('chatMessages');
    const typingHTML = `
        <div class="message bot">
            <div class="message-avatar">🤖</div>
            <div class="message-content">
                <div class="typing-indicator">
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                </div>
            </div>
        </div>
    `;
    messagesDiv.insertAdjacentHTML('beforeend', typingHTML);
    scrollToBottomSmooth();
}

// Scroll suave al final (mejorado)
function scrollToBottomSmooth() {
    const messagesDiv = document.getElementById('chatMessages');
    if (!messagesDiv) return;

    // Función de scroll forzado
    const forceScroll = () => {
        if (messagesDiv) {
            const maxScroll = messagesDiv.scrollHeight - messagesDiv.clientHeight;
            messagesDiv.scrollTop = maxScroll;
        }
    };

    // Scroll inmediato
    forceScroll();

    // Scroll después de actualización del DOM
    setTimeout(forceScroll, 0);
    setTimeout(forceScroll, 50);
    setTimeout(forceScroll, 150);
    setTimeout(forceScroll, 300);

    // También intentar con scrollTo si está disponible
    setTimeout(() => {
        if (messagesDiv) {
            try {
                messagesDiv.scrollTo({
                    top: messagesDiv.scrollHeight,
                    behavior: 'smooth'
                });
            } catch(e) {
                forceScroll();
            }
        }
    }, 200);
}

// Enviar mensaje a la IA
function sendMessageToAI(message) {
    showTypingIndicator();

    fetch('{{ route("chatbot.store") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            pregunta: message
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            addBotMessage(data.mensaje.respuesta);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        addBotMessage('Lo siento, hubo un error al procesar tu mensaje. Por favor intenta de nuevo.');
    });
}

// Formatear mensaje (soporta markdown básico)
function formatMessage(text) {
    // Convertir *texto* a <strong>texto</strong>
    text = text.replace(/\\(.+?)\\/g, '<strong>$1</strong>');

    // Convertir saltos de línea a <br>
    text = text.replace(/\n/g, '<br>');

    // Convertir emojis si están en formato texto
    const emojiMap = {
        '🏢': '🏢',
        '🟢': '🟢',
        '🔵': '🔵',
        '🔴': '🔴',
        '💰': '💰',
        '💡': '💡',
        '📡': '📡',
        '📍': '📍',
        '📅': '📅',
        '🗺': '🗺',
        '🚌': '🚌'
    };

    return escapeHtml(text);
}

// Escapar HTML
function escapeHtml(text) {
    const map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    };
    return text.replace(/[&<>"']/g, m => map[m]);
}


// Mensaje de bienvenida inicial
document.addEventListener('DOMContentLoaded', function() {
    // Aquí podrías cargar el historial de mensajes si lo deseas
    // loadChatHistory();
});
</script>

@stop