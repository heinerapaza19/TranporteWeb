<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ✅ IMPORTANTE
use App\Models\Chofer;
use App\Models\Empresa;

class ChoferAuthController extends Controller
{
    public function showLoginForm()
    {
        $empresas = Empresa::all();
        return view('chofer.login', compact('empresas'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'empresa_id' => 'required|exists:empresas,id',
            'email' => 'required|email',
            'password' => 'required|string|min:4',
        ]);

        $credenciales = [
            'email' => $request->email,
            'password' => $request->password,
            'empresa_id' => $request->empresa_id,
        ];

        // Intentar iniciar sesión con el guard 'chofer'
        if (Auth::guard('chofer')->attempt($credenciales)) {
            return redirect()
                ->route('chofer.perfil')
                ->with('success', 'Bienvenido al sistema de transporte 🚍');
        }

        // Si falla el login
        return back()->withErrors([
            'email' => 'Credenciales incorrectas o empresa no válida.',
        ]);
    }

    public function logout()
    {
        Auth::guard('chofer')->logout();
        return redirect()->route('chofer.login')->with('success', 'Sesión cerrada correctamente.');
    }
}
