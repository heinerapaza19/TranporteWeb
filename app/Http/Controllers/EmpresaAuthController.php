<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EmpresaAuthController extends Controller
{
    /**
     * 🪪 Mostrar formulario de login
     */
    public function showLogin(Request $request)
{
    // 🔒 Cerrar cualquier sesión de empresa anterior
    session()->forget(['empresa_id', 'empresa_nombre', 'empresa_logo']);

    // Si ya hay chofer logueado, lo sacamos también
    if (Auth::guard('chofer')->check()) {
        Auth::guard('chofer')->logout();
    }

    $slug = $request->query('empresa');
    $empresaPreseleccionada = null;

    if ($slug) {
        $empresaPreseleccionada = Empresa::whereRaw('LOWER(REPLACE(nombre, " ", "")) = ?', [
            strtolower(str_replace(' ', '', $slug))
        ])->first();
    }

    return view('empresa.login', compact('empresaPreseleccionada'));
}


    /**
     * 🔑 Procesar login de la empresa
     */
    public function login(Request $request)
{
    $request->validate([
        'correo_login' => 'required|email',
        'password_login' => 'required',
    ]);

    // 🔍 Obtener empresa seleccionada por el parámetro ?empresa=
    $slug = $request->query('empresa');

    // Si no hay empresa en la URL, error inmediato
    if (!$slug) {
        return back()->withErrors([
            'correo_login' => 'Debes seleccionar una empresa antes de iniciar sesión.',
        ]);
    }

    // Buscar la empresa exacta según el slug (sanroman, linea55, etc.)
    $empresaSlug = Empresa::whereRaw('LOWER(REPLACE(nombre, " ", "")) = ?', [
        strtolower(str_replace(' ', '', $slug))
    ])->first();

    if (!$empresaSlug) {
        return back()->withErrors([
            'correo_login' => 'La empresa seleccionada no existe.',
        ]);
    }

    // Buscar usuario (empresa) que coincida en correo + empresa
    $empresa = Empresa::where('id', $empresaSlug->id)
        ->where('correo_login', $request->correo_login)
        ->first();

    if ($empresa && Hash::check($request->password_login, $empresa->password_login)) {

        // Cerrar sesión de chofer si está activa
        if (Auth::guard('chofer')->check()) {
            Auth::guard('chofer')->logout();
        }

        // Crear sesión para esta empresa
        session([
            'empresa_id' => $empresa->id,
            'empresa_nombre' => $empresa->nombre,
            'empresa_logo' => $empresa->logo,
        ]);

        return redirect()->route('empresa.dashboard');
    }

    // ❌ Si el correo no pertenece a esa empresa o la contraseña es incorrecta
    return back()->withErrors([
        'correo_login' => 'Credenciales incorrectas para la empresa seleccionada.',
    ]);
}

    /**
     * 🏢 Dashboard principal (solo empresa logueada)
     */
    public function dashboard(Request $request)
{
    // 1️⃣ Verificar si hay sesión activa
    $empresaId = session('empresa_id');

    if (!$empresaId) {
        return redirect()->route('empresa.login')
            ->withErrors(['error' => 'Debes iniciar sesión para acceder al panel.']);
    }

    // 2️⃣ Buscar la empresa logueada con relaciones
    $empresa = Empresa::with(['choferes', 'vehiculos.chofer'])->find($empresaId);

    // 3️⃣ Si la empresa no existe, limpiar sesión y redirigir
    if (!$empresa) {
        session()->forget(['empresa_id', 'empresa_nombre', 'empresa_logo']);
        return redirect()->route('empresa.login')
            ->withErrors(['error' => 'Sesión inválida o empresa no encontrada.']);
    }

    // 4️⃣ Bloquear intento de acceso a otra empresa
    if ($request->route('id') && $request->route('id') != $empresaId) {
        abort(403, 'Acceso denegado: no puedes ingresar al panel de otra empresa.');
    }

    // 5️⃣ Mostrar el dashboard propio
    return view('empresa.dashboard', compact('empresa'));
}

    /**
     * 🚪 Cerrar sesión de empresa
     */
    public function logout()
    {
        // 🔒 Cerrar sesión segura
        session()->forget(['empresa_id', 'empresa_nombre', 'empresa_logo']);

        // También cierra el guard si más adelante lo usas
        if (Auth::guard('empresa')->check()) {
            Auth::guard('empresa')->logout();
        }

        return redirect()->route('empresa.login')
            ->with('success', 'Sesión cerrada correctamente.');
    }
}
