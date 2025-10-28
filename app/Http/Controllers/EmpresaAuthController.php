<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Facades\Hash;

class EmpresaAuthController extends Controller
{
    // Mostrar formulario de login
    public function showLogin(Request $request)
    {
        $slug = $request->query('empresa');
        $empresaPreseleccionada = null;

        if ($slug) {
            $empresaPreseleccionada = Empresa::whereRaw('LOWER(REPLACE(nombre, " ", "")) = ?', [
                strtolower(str_replace(' ', '', $slug))
            ])->first();
        }

        return view('empresa.login', compact('empresaPreseleccionada'));
    }

    // Procesar login
    public function login(Request $request)
    {
        $request->validate([
            'correo_login' => 'required|email',
            'password_login' => 'required',
        ]);

        $empresa = Empresa::where('correo_login', $request->correo_login)->first();

        if ($empresa && Hash::check($request->password_login, $empresa->password_login)) {
            session([
                'empresa_id' => $empresa->id,
                'empresa_nombre' => $empresa->nombre,
                'empresa_logo' => $empresa->logo,
            ]);

            return redirect()->route('empresa.dashboard');
        }

        return back()->withErrors([
            'correo_login' => 'Correo o contraseña incorrectos',
        ]);
    }

    // Dashboard (solo si está logueada)
    public function dashboard()
    {
        if (!session()->has('empresa_id')) {
            return redirect()->route('empresa.login');
        }

        $empresa = Empresa::with(['choferes', 'vehiculos'])->find(session('empresa_id'));

        return view('empresa.dashboard', compact('empresa'));
    }

    // Cerrar sesión
    public function logout()
    {
        session()->forget(['empresa_id', 'empresa_nombre', 'empresa_logo']);
        return redirect()->route('empresa.login');
    }
}
