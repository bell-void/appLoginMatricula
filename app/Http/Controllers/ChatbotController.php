<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $message = strtolower(trim($request->input('message')));
        
        // ==================== 1. PREGUNTAS DE BASE DE DATOS ====================
        if (str_contains($message, 'alumnos') && (str_contains($message, 'cuantos') || str_contains($message, 'cuántos'))) {
            $count = DB::table('alumnos')->count();
            $bot = "📊 Actualmente hay $count alumnos registrados en el sistema.";
            return response()->json(['user' => $request->message, 'bot' => $bot]);
        }
        elseif (str_contains($message, 'cursos') && (str_contains($message, 'cuantos') || str_contains($message, 'cuántos'))) {
            $count = DB::table('cursos')->count();
            $bot = "📚 Hay $count cursos disponibles en el catálogo.";
            return response()->json(['user' => $request->message, 'bot' => $bot]);
        }
        elseif (str_contains($message, 'aulas') && (str_contains($message, 'cuantos') || str_contains($message, 'cuántas'))) {
            $count = DB::table('aulas')->count();
            $bot = "🏫 Hay $count aulas registradas en la institución.";
            return response()->json(['user' => $request->message, 'bot' => $bot]);
        }
        elseif (str_contains($message, 'horarios') && (str_contains($message, 'cuantos') || str_contains($message, 'cuántos'))) {
            $count = DB::table('horarios')->count();
            $bot = "⏰ Hay $count horarios programados actualmente.";
            return response()->json(['user' => $request->message, 'bot' => $bot]);
        }
        elseif (str_contains($message, 'matriculas') && (str_contains($message, 'cuantos') || str_contains($message, 'cuántas'))) {
            $count = DB::table('matriculas')->count();
            $bot = "📝 Hay $count matrículas registradas en el sistema.";
            return response()->json(['user' => $request->message, 'bot' => $bot]);
        }
        elseif (str_contains($message, 'docentes') && (str_contains($message, 'cuantos') || str_contains($message, 'cuántos'))) {
            $count = DB::table('docentes')->count();
            $bot = "👨‍🏫 Contamos con $count docentes en nuestra planilla.";
            return response()->json(['user' => $request->message, 'bot' => $bot]);
        }
        
        // ==================== 2. LISTADO DE CURSOS ====================
        if ((str_contains($message, 'cursos') && (str_contains($message, 'lista') || str_contains($message, 'cuales') || str_contains($message, 'cuáles') || str_contains($message, 'ofrecen')))) {
            $cursos = DB::table('cursos')->limit(8)->get();
            $lista = '';
            foreach ($cursos as $curso) {
                $lista .= "📚 {$curso->nombre_curso}\n";
            }
            $count = DB::table('cursos')->count();
            $bot = "Tenemos $count cursos disponibles. Algunos de ellos son:\n{$lista}\n¿Te gustaría saber más sobre algún curso en específico?";
            return response()->json(['user' => $request->message, 'bot' => $bot]);
        }
        
        // ==================== 3. PREGUNTAS PREDEFINIDAS ====================
        // Información institucional
        if (str_contains($message, 'quienes somos') || str_contains($message, 'qué es blue butterfly')) {
            $bot = "🦋 Blue Butterfly es un sistema de gestión académica que automatiza matrículas, organiza cursos, controla horarios y genera reportes en tiempo real. Ayudamos a instituciones educativas a optimizar sus procesos administrativos. ¿Te gustaría saber más sobre nuestras funcionalidades?";
        }
        elseif (str_contains($message, 'mision') || str_contains($message, 'misión')) {
            $bot = "🎯 Nuestra misión es transformar la gestión educativa mediante tecnología innovadora, accesible y eficiente, permitiendo que las instituciones se enfoquen en lo más importante: la educación de calidad.";
        }
        elseif (str_contains($message, 'vision') || str_contains($message, 'visión')) {
            $bot = "👁️ Nuestra visión es ser la plataforma líder en gestión académica en América Latina, reconocida por nuestra innovación y compromiso con la educación.";
        }
        
        // Proceso de matrícula
        elseif (str_contains($message, 'como me matriculo') || str_contains($message, 'proceso de matrícula')) {
            $bot = "📝 Para matricularte, sigue estos pasos:\n1️⃣ Regístrate en nuestra plataforma\n2️⃣ Explora el catálogo de cursos\n3️⃣ Selecciona los cursos que deseas\n4️⃣ Completa el formulario de matrícula\n5️⃣ Realiza el pago (si aplica)\n\n¿Necesitas ayuda con algún paso específico?";
        }
        elseif (str_contains($message, 'requisitos')) {
            $bot = "📋 Los requisitos generales son: documento de identidad, correo electrónico válido, cumplir con los prerrequisitos del curso y pago de matrícula. ¿Hay algún curso específico que te interese?";
        }
        
        // Precios
        elseif (str_contains($message, 'precio') || str_contains($message, 'cuesta') || str_contains($message, 'valor')) {
            $bot = "💰 Ofrecemos planes desde gratuitos (funcionalidades básicas) hasta planes empresariales. Los cursos individuales tienen precios desde S/ 150. ¿Te gustaría recibir una cotización personalizada?";
        }
        elseif (str_contains($message, 'formas de pago') || str_contains($message, 'como pagar')) {
            $bot = "💳 Aceptamos: transferencia bancaria (BCP, BBVA, Interbank), tarjetas de crédito/débito (Visa, Mastercard), pagos en efectivo en oficinas, Yape/Plin. ¿Necesitas ayuda con algún método específico?";
        }
        
        // Horarios
        elseif (str_contains($message, 'horario de atención') || str_contains($message, 'cuando atienden')) {
            $bot = "🕐 Horario de atención: Lunes a viernes de 9am a 6pm, Sábados de 9am a 1pm. ¿Necesitas ayuda urgente? Puedes enviarnos un correo a soporte.bluebutterfly@gmail.com";
        }
        
        // Contacto
        elseif (str_contains($message, 'contacto') || str_contains($message, 'correo') || str_contains($message, 'teléfono')) {
            $bot = "📧 Contáctanos:\n• Email: soporte.bluebutterfly@gmail.com\n• Teléfono: +51 1 234 5678\n• WhatsApp: +51 987 654 321\n• Dirección: Av. Principal 123, Lima, Perú\n• Redes: @bluebutterfly";
        }
        
        // Certificados
        elseif (str_contains($message, 'certificado') || str_contains($message, 'diploma')) {
            $bot = "📜 ¡Sí! Al finalizar cada curso obtienes certificado digital con código QR verificable, diploma de participación y constancia de estudios. Los certificados tienen validez nacional.";
        }
        
        // Becas
        elseif (str_contains($message, 'beca') || str_contains($message, 'descuento')) {
            $bot = "🎓 Contamos con becas para estudiantes destacados y descuentos por pronto pago. También ofrecemos descuentos corporativos. ¿Te gustaría conocer más sobre las becas disponibles?";
        }
        
        // Saludos
        elseif (str_contains($message, 'hola') || str_contains($message, 'buenas') || str_contains($message, 'saludos')) {
            $bot = "👋 ¡Hola! Soy BlueBot, tu asistente virtual. Puedo ayudarte con información sobre cursos, matrículas, horarios, precios o responder preguntas más complejas usando inteligencia artificial. ¿Qué te gustaría saber?";
        }
        elseif (str_contains($message, 'gracias')) {
            $bot = "🙏 ¡De nada! Estoy aquí para ayudarte. ¿Necesitas algo más?";
        }
        elseif (str_contains($message, 'adios') || str_contains($message, 'chao') || str_contains($message, 'hasta luego')) {
            $bot = "👋 ¡Hasta luego! Fue un placer ayudarte. ¡Que tengas un excelente día! 🌟";
        }
        
        // ==================== 4. AYUDA ====================
        elseif (str_contains($message, 'ayuda') || str_contains($message, 'que puedes hacer')) {
            $bot = "🤖 Puedo ayudarte con:\n\n📌 Información institucional\n📚 Cursos disponibles\n📝 Proceso de matrícula\n💰 Precios y formas de pago\n⏰ Horarios\n📞 Contacto\n📜 Certificados\n🎓 Becas\n\nAdemás, puedo responder preguntas complejas usando inteligencia artificial. ¿Qué te gustaría consultar?";
        }
        
        // ==================== 5. INTELIGENCIA ARTIFICIAL (GROQ) ====================
        else {
            try {
                $groqApiKey = env('GROQ_API_KEY');
                
                if (!$groqApiKey) {
                    $bot = "Puedo ayudarte con información sobre alumnos, cursos, aulas, horarios y matrículas. También puedo responder preguntas generales si configuras la API. ¿Qué deseas saber?";
                    return response()->json(['user' => $request->message, 'bot' => $bot]);
                }
                
                // Obtener datos del sistema para contexto
                $totalAlumnos = DB::table('alumnos')->count();
                $totalCursos = DB::table('cursos')->count();
                $totalAulas = DB::table('aulas')->count();
                $totalDocentes = DB::table('docentes')->count();
                $totalHorarios = DB::table('horarios')->count();
                $totalMatriculas = DB::table('matriculas')->count();
                
                // Llamar a Groq
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $groqApiKey,
                    'Content-Type' => 'application/json',
                ])->timeout(15)->post('https://api.groq.com/openai/v1/chat/completions', [
                    "model" => "llama-3.1-8b-instant",
                    "messages" => [
                        [
                            "role" => "system",
                            "content" => "Eres 'BlueBot', el asistente virtual de Blue Butterfly, un sistema de gestión académica. 
                            
DATOS DEL SISTEMA:
- Alumnos: $totalAlumnos
- Cursos: $totalCursos
- Aulas: $totalAulas
- Docentes: $totalDocentes
- Horarios: $totalHorarios
- Matrículas: $totalMatriculas

CONTACTO: soporte.bluebutterfly@gmail.com

Responde en español, de forma amable, concisa y útil. Usa emojis ocasionalmente. Si no sabes algo, sugiere revisar la web o contactar a soporte."
                        ],
                        [
                            "role" => "user",
                            "content" => $message
                        ]
                    ],
                    "temperature" => 0.7,
                    "max_tokens" => 500,
                ]);
                
                $data = $response->json();
                
                if (isset($data['choices'][0]['message']['content'])) {
                    $bot = $data['choices'][0]['message']['content'];
                } else {
                    $bot = "Lo siento, no pude procesar tu consulta. ¿Podrías intentar de nuevo?";
                }
                
            } catch (\Exception $e) {
                Log::error('Groq API Error: ' . $e->getMessage());
                $bot = "Lo siento, estoy teniendo problemas de conexión con la IA. Por favor, intenta de nuevo más tarde. Mientras tanto, puedo ayudarte con información básica sobre cursos, matrículas, horarios y precios.";
            }
        }
        
        return response()->json([
            'user' => $request->input('message'),
            'bot' => $bot
        ]);
    }
}