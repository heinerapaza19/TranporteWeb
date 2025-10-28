<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Empresa;

class VehiculoController extends Controller
{
    /**
     * Mostrar todos los vehículos de una empresa
     */
    public function index()
    {
        $empresaId = session('empresa_id');

        if (!$empresaId) {
            return redirect()->route('empresa.login')->withErrors(['Debe iniciar sesión para acceder.']);
        }

        $empresa = Empresa::with('vehiculos.chofer')->findOrFail($empresaId);
        return view('empresa.dashboard', compact('empresa'));
    }

    /**
     * Guardar un nuevo vehículo
     */
    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required|string|max:10|unique:vehiculos',
            'modelo' => 'required|string|max:100',
            'color' => 'nullable|string|max:50',
            'capacidad' => 'nullable|integer',
            'soat' => 'nullable|string|max:20',
            'revision_tecnica' => 'nullable|string|max:20',
            'empresa_id' => 'required|exists:empresas,id',
        ]);

        Vehiculo::create($request->all());

        return back()->with('success', '🚗 Vehículo registrado correctamente');
    }

    /**
     * Actualizar vehículo existente
     */
    public function update(Request $request, $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);

        $request->validate([
            'placa' => 'required|string|max:10|unique:vehiculos,placa,' . $vehiculo->id,
            'modelo' => 'required|string|max:100',
            'color' => 'nullable|string|max:50',
            'capacidad' => 'nullable|integer',
            'soat' => 'nullable|string|max:20',
            'revision_tecnica' => 'nullable|string|max:20',
        ]);

        $vehiculo->update($request->all());

        return back()->with('success', '✏️ Vehículo actualizado correctamente');
    }

    /**
     * Eliminar vehículo
     */
    public function destroy($id)
    {
        Vehiculo::findOrFail($id)->delete();
        return back()->with('success', '🗑️ Vehículo eliminado correctamente');
    }
}
