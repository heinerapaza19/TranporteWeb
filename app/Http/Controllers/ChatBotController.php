<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatbotMensaje;
use App\Models\Usuario;

class ChatbotController extends Controller
{
    /**
     * Mostrar la vista del chatbot
     */
    public function index()
    {
        return view('chatbot.index');
    }

    /**
     * Guardar un mensaje del chatbot y obtener respuesta de IA
     */
    public function store(Request $request)
    {
        $request->validate([
            'pregunta' => 'required|string|max:1000',
        ]);

        $pregunta = $request->pregunta;

        // Respuesta de IA
        $respuesta = $this->getAIResponse($pregunta);

        // Guardar en base de datos
        $mensaje = ChatbotMensaje::create([
            'usuario_id' => null,
            'pregunta' => $pregunta,
            'respuesta' => $respuesta,
            'fecha_hora' => now(),
        ]);

        return response()->json([
            'success' => true,
            'mensaje' => $mensaje
        ]);
    }

    /**
     * Obtener el historial de mensajes
     */
    public function historial()
    {
        $mensajes = ChatbotMensaje::orderBy('fecha_hora', 'asc')->limit(50)->get();
        return response()->json($mensajes);
    }

    /**
     * Obtener respuesta de IA (puede usar OpenAI o respuestas predefinidas)
     */
    private function getAIResponse($pregunta)
    {
        $preguntaLower = strtolower($pregunta);

        // Intentar usar OpenAI si está configurado
        $openaiKey = env('OPENAI_API_KEY');
        if ($openaiKey && strlen($openaiKey) > 0) {
            try {
                $response = $this->getOpenAIResponse($pregunta);
                if ($response) {
                    return $response;
                }
            } catch (\Exception $e) {
                // Si falla OpenAI, usar respuestas predefinidas
            }
        }

        // Usar respuestas inteligentes predefinidas con tono conversacional

        // Respuestas contextuales más naturales y conversacionales
        if (str_contains($preguntaLower, 'horario') || str_contains($preguntaLower, 'hora')) {
            return "Claro, te puedo ayudar con los horarios. En Juliaca, el transporte público opera con diferentes horarios según la empresa. " .
                   "San Román funciona de 5 de la mañana hasta las 11 de la noche, Línea 18 de 5:30 AM a 10:30 PM, " .
                   "Línea 22 de 6 AM a 10 PM, y Línea 55 también de 5 AM a 11 PM. " .
                   "Generalmente los buses pasan cada 10 a 15 minutos durante las horas pico, así que no deberías esperar mucho.";
        }

        if (str_contains($preguntaLower, 'ruta') || str_contains($preguntaLower, 'recorrido')) {
            return "En la ciudad tenemos cuatro empresas de transporte público activas. " .
                   "San Román que es la naranja cubre principalmente la zona norte, Línea 18 en verde atiende la zona este, " .
                   "Línea 22 en azul maneja el centro de la ciudad, y Línea 55 en rojo cubre la zona sur. " .
                   "Si quieres ver las rutas específicas de cada una o sus vehículos disponibles, puedes entrar al panel de la empresa desde el menú principal.";
        }

        if (str_contains($preguntaLower, 'paradero') || str_contains($preguntaLower, 'parada')) {
            return "Los paraderos están distribuidos a lo largo de todas las rutas. " .
                   "La distancia entre uno y otro generalmente es de unos 400 a 500 metros, así que hay bastante cobertura. " .
                   "Para ver exactamente dónde están ubicados, puedes revisar el mapa de rutas en el dashboard o usar la función de ubicación en vivo. " .
                   "Además, los paraderos están bien señalizados con letreros de la empresa correspondiente.";
        }

        if (str_contains($preguntaLower, 'precio') || str_contains($preguntaLower, 'cuesta') || str_contains($preguntaLower, 'tarifa') || str_contains($preguntaLower, 'pasaje') || str_contains($preguntaLower, 'micro')) {
            return "El precio del pasaje en todas las rutas es de S/ 1.50. Es un precio fijo, así que no hay descuentos especiales. " .
                   "El pago se hace en efectivo directamente al conductor cuando subes al bus. " .
                   "Un consejo útil: si tienes el pasaje exacto listo, todo será más rápido para ti y para los demás pasajeros.";
        }

        if (str_contains($preguntaLower, 'rastrear') || str_contains($preguntaLower, 'ubicación') || str_contains($preguntaLower, 'gps')) {
            return "Sí, puedes rastrear los vehículos en tiempo real. " .
                   "Desde el dashboard principal hay un botón que dice 'Ver Ubicación' que te lleva al mapa interactivo. " .
                   "Ahí puedes ver dónde están todos los buses en este momento, su velocidad, y también puedes calcular cuánto tiempo aproximadamente va a tardar en llegar. " .
                   "Es bastante útil si quieres planificar mejor tus viajes.";
        }

        if (str_contains($preguntaLower, 'empresa')) {
            return "Actualmente tenemos cuatro empresas operando en el sistema. " .
                   "San Román con su correo sanroman@transporte.com, Línea 18 en linea18@transporte.com, " .
                   "Línea 22 en linea22@transporte.com, y Línea 55 en linea55@transporte.com. " .
                   "Cada una maneja sus propios vehículos, choferes y rutas de forma independiente. " .
                   "Si necesitas contactarlas o ver más detalles, puedes acceder a sus paneles desde el menú lateral del sistema.";
        }

        if (str_contains($preguntaLower, 'hola') || str_contains($preguntaLower, 'buenos') || str_contains($preguntaLower, 'buenas')) {
            return "Hola, qué tal. Soy tu asistente virtual del sistema de transporte. " .
                   "Puedo ayudarte con información sobre horarios, rutas, paraderos, tarifas, rastreo en vivo, o cualquier otra cosa relacionada con el transporte público en Juliaca. " .
                   "¿Qué necesitas saber?";
        }

        if (str_contains($preguntaLower, 'ayuda') || str_contains($preguntaLower, 'help')) {
            return "Por supuesto, estoy aquí para ayudarte. Puedo darte información sobre los horarios de las rutas, " .
                   "qué rutas y empresas están disponibles, dónde están los paraderos, los precios de los pasajes, " .
                   "cómo rastrear los vehículos en tiempo real, y datos de las empresas. " .
                   "Solo pregunta lo que necesites y te responderé con la información correspondiente.";
        }

        // Respuestas a saludos y cortesía
        if (str_contains($preguntaLower, 'gracias') || str_contains($preguntaLower, 'thank')) {
            return "De nada, para eso estoy. Si necesitas algo más sobre el transporte público, no dudes en preguntarme. Que tengas un buen viaje.";
        }

        if (str_contains($preguntaLower, 'adios') || str_contains($preguntaLower, 'chau') || str_contains($preguntaLower, 'bye')) {
            return "Hasta luego, que tengas un excelente día. Cualquier cosa que necesites sobre el transporte, aquí estaré.";
        }

        if (str_contains($preguntaLower, 'ok') || str_contains($preguntaLower, 'okay') || str_contains($preguntaLower, 'vale')) {
            return "Perfecto. ¿Hay algo más en lo que pueda ayudarte sobre el transporte público?";
        }

        // Respuesta inteligente contextual
        return $this->generateContextualResponse($preguntaLower);
    }

    /**
     * Integración con OpenAI API
     */
    private function getOpenAIResponse($pregunta)
    {
        $openaiKey = env('OPENAI_API_KEY');

        if (!$openaiKey) {
            return null;
        }

        $context = "Eres un asistente virtual del sistema de transporte público de Juliaca, Perú. " .
                   "Puedes responder preguntas sobre horarios, rutas, paraderos, tarifas (S/ 1.50), empresas de transporte (San Román, Línea 18, Línea 22, Línea 55), " .
                   "y rastreo GPS. Responde de forma conversacional y natural, como una persona amigable. " .
                   "Si no sabes algo específico del transporte, sé honesto pero mantén un tono profesional.";

        $data = [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => $context],
                ['role' => 'user', 'content' => $pregunta]
            ],
            'max_tokens' => 200,
            'temperature' => 0.7
        ];

        $ch = curl_init('https://api.openai.com/v1/chat/completions');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $openaiKey
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200) {
            return null;
        }

        $result = json_decode($response, true);

        if (isset($result['choices'][0]['message']['content'])) {
            return trim($result['choices'][0]['message']['content']);
        }

        return null;
    }

    /**
     * Generar respuesta contextual más inteligente
     */
    private function generateContextualResponse($preguntaLower)
    {
        // Detectar palabras clave y generar respuestas más naturales
        $keywords = [
            'cuando' => 'Para horarios específicos, te puedo decir que las empresas operan desde las 5-6 AM hasta las 10-11 PM dependiendo de cuál sea.',
            'donde' => 'Puedo ayudarte a encontrar información sobre ubicaciones. Si necesitas saber dónde están los paraderos o las rutas, puedo darte más detalles.',
            'como' => 'Te puedo explicar cómo funciona. ¿Quieres saber cómo consultar horarios, cómo rastrear un vehículo, o algo más específico?',
            'que' => 'Sobre eso puedo ayudarte. Si me das más detalles sobre qué información necesitas del transporte público, te daré una respuesta más específica.',
        ];

        foreach ($keywords as $key => $response) {
            if (str_contains($preguntaLower, $key)) {
                return $response;
            }
        }

        // Respuesta completamente genérica pero amigable
        return "Gracias por tu pregunta. Me enfoco en ayudarte con todo lo relacionado al transporte público de Juliaca: horarios, rutas, paraderos, precios y empresas. " .
               "Si reformulas tu pregunta relacionándola con alguno de estos temas, te podré dar una respuesta más precisa. " .
               "O si quieres, puedo contarte sobre los horarios, las tarifas, o cómo rastrear los buses en tiempo real.";
    }
}

