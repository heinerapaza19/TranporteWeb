<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatBotController extends Controller
{
    private $rutas = [
        'linea_16' => [
            'nombre' => 'Línea 16',
            'emoji' => '🟣',
            'ruta' => 'Salida Cusco → Av. Circunvalación → Av. Tacna → Óvalo San Martín → Terminal Terrestre → Jr. San Martín → Centro Comercial → Jr. Mariano Núñez → Óvalo Salida Cusco → Puente Maravillas → Salida Cusco → Cementerio Chile → San Martín → Colegio JAE → Jr. Maestro → Jr. Cahuide → Triángulo Salida Cusco → Av. Ferrocarril → Óvalo Parque Cholo → Salida Lampa',
            'lugares_clave' => ['terminal terrestre', 'san martin', 'centro comercial', 'parque cholo', 'salida cusco', 'salida lampa', 'cementerio', 'jae', 'mariano nunez', 'puente maravillas']
        ],
        'linea_15' => [
            'nombre' => 'Línea 15',
            'emoji' => '🟡',
            'ruta' => 'SENATI → Salida Puno → Mercado Cerro Colorado → Av. Tacna → Circunvalación → Túpac Amaru → Salida Huancané',
            'lugares_clave' => ['senati', 'cerro colorado', 'mercado', 'tupac amaru', 'salida huancane', 'salida puno']
        ],
        'linea_18' => [
            'nombre' => 'Línea 18',
            'emoji' => '🟠',
            'ruta' => 'Av. Tacna → Circunvalación → Tambopata → UPeU Juliaca',
            'lugares_clave' => ['upeu', 'universidad', 'tambopata']
        ],
        'linea_22' => [
            'nombre' => 'Línea 22',
            'emoji' => '🔵',
            'ruta' => 'Plaza Bolognesi → Jr. Moquegua → Aeropuerto Inca Manco Cápac',
            'lugares_clave' => ['aeropuerto', 'bolognesi', 'plaza bolognesi', 'moquegua']
        ],
        'linea_55' => [
            'nombre' => 'Línea 55',
            'emoji' => '🔴',
            'ruta' => 'Av. San Martín → Terminal Las Mercedes → Salida Arequipa',
            'lugares_clave' => ['terminal mercedes', 'mercedes', 'salida arequipa']
        ],
        'linea_60' => [
            'nombre' => 'Línea 60',
            'emoji' => '🟤',
            'ruta' => 'Salida Huancané → Circunvalación → Av. Tacna → Óvalo San Martín → Parque Cholo → Av. Ferrocarril → Salida Lampa',
            'lugares_clave' => ['parque cholo', 'ferrocarril', 'salida lampa', 'salida huancane']
        ],
        'micro_1' => [
            'nombre' => 'Micro 1',
            'emoji' => '⚪',
            'ruta' => 'Rinconada → Parque Grau → Piscina Municipal → Centro Comercial → Plaza Vea → Jr. San Martín → Terminal Terrestre → Av. San Martín',
            'lugares_clave' => ['rinconada', 'parque grau', 'piscina', 'piscina municipal', 'centro comercial', 'plaza vea', 'terminal terrestre', 'san martin']
        ]
    ];

    public function inicio()
    {
        return response()->json([
            'respuesta' => "👋 ¡Hola! Soy tu asistente del transporte. Pregúntame lo que quieras."
        ]);
    }

    public function responder(Request $request)
    {
        try {
            $mensaje = $request->input('mensaje', '');
            
            if (empty($mensaje)) {
                return response()->json([
                    'respuesta' => "🤔 No recibí ningún mensaje. Escríbeme algo."
                ]);
            }

            $mensajeOriginal = $mensaje;
            $mensaje = strtolower(trim($mensaje));
            $mensaje = $this->normalizarTexto($mensaje);

            Log::info("Mensaje recibido: " . $mensaje);

            // 🧭 Si el usuario dice "para la upeu" o "quiero ir al aeropuerto"
            if (preg_match('/\b(quiero ir a|voy a|para ir a|para la|como llego a|ir a)\b/', $mensaje)) {
                $mensaje = preg_replace('/\b(quiero ir a|voy a|para ir a|para la|como llego a|ir a)\b/', '', $mensaje);
                $mensaje = trim($mensaje);
            }

            // 🔹 Respuesta local
            $respuestaLocal = $this->respuestaLocal($mensaje);
            if (!str_contains($respuestaLocal, 'No entendí')) {
                return response()->json(['respuesta' => $respuestaLocal]);
            }

            // 🔹 API backup (solo si falla local)
            $apiKey = env('OPENROUTER_API_KEY');
            if (!empty($apiKey)) {
                try {
                    $respuestaAPI = $this->consultarAPI($mensajeOriginal, $apiKey);
                    if ($respuestaAPI) {
                        return response()->json(['respuesta' => $respuestaAPI]);
                    }
                } catch (\Exception $e) {
                    Log::warning("Error API: " . $e->getMessage());
                }
            }

            return response()->json(['respuesta' => $respuestaLocal]);

        } catch (\Exception $e) {
            Log::error("Error en responder: " . $e->getMessage());
            return response()->json([
                'respuesta' => "❌ Ocurrió un error, intenta de nuevo."
            ], 200);
        }
    }

    private function buscarRuta($mensaje)
    {
        $lineasEncontradas = [];

        foreach ($this->rutas as $ruta) {
            foreach ($ruta['lugares_clave'] as $lugar) {
                if (str_contains($mensaje, $lugar)) {
                    $lineasEncontradas[] = $ruta;
                    break;
                }
            }
        }

        return $lineasEncontradas;
    }

    private function consultarAPI($mensaje, $apiKey)
    {
        $response = Http::timeout(8)
            ->withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'HTTP-Referer' => env('APP_URL', 'http://localhost'),
                'X-Title' => 'ChatBot Transporte Juliaca'
            ])
            ->post('https://openrouter.ai/api/v1/chat/completions', [
                'model' => env('MODEL_ID', 'mistralai/mistral-7b-instruct:free'),
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => "Eres asistente del transporte público de Juliaca, Perú.
Responde corto y directo.
NO uses markdown ni etiquetas.
Máximo 3 líneas.

RUTAS DISPONIBLES:
- Línea 18: UPeU (Av. Tacna, Circunvalación, Tambopata)
- Línea 22: Aeropuerto (Plaza Bolognesi, Jr. Moquegua)
- Línea 55: Terminal Mercedes (Av. San Martín)
- Línea 16: Terminal, Parque Cholo (Cusco-Lampa)
- Línea 15: SENATI (Cerro Colorado, Huancané)
- Línea 60: Parque Cholo (Huancané-Lampa)
- Micro 1: Rinconada, Plaza Vea, Terminal

Tarifas: S/1.00 adulto, S/0.50 escolar
Sin ruta: Mototaxi S/5, Moto lineal S/4, Taxi S/10"
                    ],
                    ['role' => 'user', 'content' => $mensaje]
                ],
                'max_tokens' => 100,
                'temperature' => 0.3
            ]);

        if ($response->successful()) {
            $data = $response->json();
            $contenido = $data['choices'][0]['message']['content'] ?? null;
            
            if ($contenido) {
                return $this->limpiarRespuesta($contenido);
            }
        }

        return null;
    }

    private function limpiarRespuesta($texto)
    {
        $texto = preg_replace('/\[.*?\]/', '', $texto);
        $texto = preg_replace('/\*|_|~|`/', '', $texto);
        $texto = strip_tags($texto);
        return trim($texto);
    }

    private function normalizarTexto($texto)
    {
        $buscar = ['á','é','í','ó','ú','ñ','Á','É','Í','Ó','Ú','Ñ'];
        $reemplazar = ['a','e','i','o','u','n','A','E','I','O','U','N'];
        $texto = str_replace($buscar, $reemplazar, $texto);
        $texto = preg_replace('/[^a-z0-9\s]/', ' ', $texto);
        return trim($texto);
    }

    private function respuestaLocal($msg)
    {
        // 👋 SALUDOS
        if (preg_match('/\b(hola|buenas|buenos|hey|ola|hi)\b/', $msg)) {
            return "👋 ¡Hola! ¿En qué puedo ayudarte con el transporte público de Juliaca?";
        }

        // 🔍 Buscar rutas por lugar
        $lineas = $this->buscarRuta($msg);
        if (!empty($lineas)) {
            $respuesta = "🚍 Líneas que pasan por ahí:\n\n";
            foreach ($lineas as $linea) {
                $respuesta .= "{$linea['emoji']} {$linea['nombre']}\n";
            }
            $respuesta .= "\n💰 S/1.00 adulto | S/0.50 escolar";
            return $respuesta;
        }

        // ❌ Lugares sin ruta
        if (preg_match('/\b(cata|colegio cata|chilla|2 de mayo|dos de mayo)\b/', $msg)) {
            return "❌ No hay línea directa para ese lugar.\n\n🛵 Moto lineal: S/4.00\n🛺 Mototaxi: S/5.00\n🚖 Taxi: S/10.00";
        }

        // 💰 Tarifas
        if (preg_match('/\b(tarifa|precio|pasaje|costo|cuanto)\b/', $msg)) {
            return "💰 Tarifas en Juliaca:\n\n🚌 Microbús: S/1.00 adulto | S/0.50 escolar\n🛵 Moto lineal: S/4.00\n🛺 Mototaxi (torito): S/5.00\n🚖 Taxi: S/10.00";
        }

        // 🔢 Líneas específicas
        foreach ($this->rutas as $key => $linea) {
            if (str_contains($msg, str_replace('linea_', 'linea ', $key)) || str_contains($msg, $key)) {
                return "{$linea['emoji']} **{$linea['nombre']}**:\n{$linea['ruta']}\n💰 S/1.00 adulto | S/0.50 escolar";
            }
        }

        // 📋 Listar líneas
        if (preg_match('/\b(lineas|rutas|que lineas|cuales|todas)\b/', $msg)) {
            return "🚍 Líneas disponibles en Juliaca:\n\n🟠 Línea 18: UPeU\n🔵 Línea 22: Aeropuerto\n🔴 Línea 55: Terminal Mercedes\n🟣 Línea 16: Terminal, Centro Comercial\n🟡 Línea 15: SENATI, Cerro Colorado\n🟤 Línea 60: Parque Cholo\n⚪ Micro 1: Rinconada, Plaza Vea\n\n💬 Pregunta por un destino o línea.";
        }

        // 🟥 Sin coincidencias
        return "🚫 Ninguna línea registrada pasa por ahí.\nPuedes tomar:\n🛵 Moto lineal (S/4.00)\n🛺 Mototaxi (S/5.00)\n🚖 Taxi (S/10.00)";
    }
}
