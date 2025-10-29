<?php

namespace App\Http\Controllers;

use App\Models\Chofer;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChoferController extends Controller
{
    /**
     * 👤 Registrar un nuevo chofer desde el panel de empresa
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'dni' => 'required|string|max:10|unique:choferes',
            'licencia' => 'nullable|string|max:20',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:choferes,email',
            'password' => 'nullable|string|min:6',
            'ruta_asignada' => 'nullable|string|max:100',
            'estado_licencia' => 'nullable|in:Activa,Inactiva,Pendiente',
            'educacion_vial' => 'nullable|in:Aprobado,Pendiente,Reprobado',
            'empresa_id' => 'required|exists:empresas,id',
        ]);

        $data = $request->all();

        // Si se proporciona contraseña, encriptarla
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        Chofer::create($data);

        return back()->with('success', '👤 Chofer registrado correctamente');
    }

    /**
     * ✏️ Actualizar chofer (solo empresa logueada)
     */
    public function update(Request $request, $id)
    {
        if (!session()->has('empresa_id')) {
            abort(403, 'Acceso denegado. Solo las empresas pueden editar choferes.');
        }

        $chofer = Chofer::findOrFail($id);

        $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'dni' => 'required|string|max:10|unique:choferes,dni,' . $chofer->id,
            'licencia' => 'nullable|string|max:20',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:choferes,email,' . $chofer->id,
            'password' => 'nullable|string|min:6',
            'ruta_asignada' => 'nullable|string|max:100',
            'estado_licencia' => 'nullable|in:Activa,Inactiva,Pendiente',
            'educacion_vial' => 'nullable|in:Aprobado,Pendiente,Reprobado',
        ]);

        $data = $request->all();

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $chofer->update($data);

        return back()->with('success', '✏️ Datos del chofer actualizados correctamente.');
    }

    /**
     * 🗑 Eliminar chofer
     */
    public function destroy($id)
    {
        Chofer::findOrFail($id)->delete();
        return back()->with('success', '🗑 Chofer eliminado correctamente');
    }

    /**
     * 👨‍✈️ Mostrar perfil del chofer logueado
     */
    public function perfil()
    {
        $chofer = Auth::guard('chofer')->user();

        if (!$chofer) {
            return redirect()->route('chofer.login')
                ->withErrors(['error' => 'Debes iniciar sesión para ver tu perfil.']);
        }

        $vehiculo = $chofer->vehiculo()->first();
        return view('chofer.perfil', compact('chofer', 'vehiculo'));
    }

    /**
     * ⚙️ Vista para editar perfil del chofer
     */
    public function editarPerfil()
    {
        $chofer = Auth::guard('chofer')->user();

        if (!$chofer) {
            return redirect()->route('chofer.login')
                ->withErrors(['error' => 'Debes iniciar sesión.']);
        }

        $vehiculo = $chofer->vehiculo()->first();
        return view('chofer.editar', compact('chofer', 'vehiculo'));
    }

    /**
     * 🔑 Mostrar formulario de login
     */
    public function loginForm()
    {
        $empresas = Empresa::all();
        return view('chofer.login', compact('empresas'));
    }

    /**
     * 🔐 Procesar login del chofer
     */
    public function loginPost(Request $request)
    {
        $request->validate([
            'empresa_id' => 'required|exists:empresas,id',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $chofer = Chofer::where('email', $request->email)
            ->where('empresa_id', $request->empresa_id)
            ->first();

        if (!$chofer || !Hash::check($request->password, $chofer->password)) {
            return back()->withErrors(['error' => '❌ Credenciales incorrectas o empresa no coincide.']);
        }

        Auth::guard('chofer')->login($chofer);

        return redirect()->route('chofer.perfil');
    }

    /**
     * 🚪 Cerrar sesión del chofer
     */
    public function logout()
    {
        Auth::guard('chofer')->logout();
        return redirect()->route('chofer.login')
            ->with('success', 'Sesión cerrada correctamente.');
    }
}
