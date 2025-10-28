<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chofer;
use App\Models\Empresa;

class ChoferController extends Controller
{
    /**
     * Guardar un nuevo chofer
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'dni' => 'required|string|max:10|unique:choferes',
            'licencia' => 'nullable|string|max:20',
            'telefono' => 'nullable|string|max:20',
            'ruta_asignada' => 'nullable|string|max:100',
            'estado_licencia' => 'nullable|in:Activa,Inactiva,Pendiente',
            'educacion_vial' => 'nullable|in:Aprobado,Pendiente,Reprobado',
            'empresa_id' => 'required|exists:empresas,id',
        ]);

        Chofer::create($request->all());

        return back()->with('success', '👤 Chofer registrado correctamente');
    }

    /**
     * Actualizar chofer existente
     */
    public function update(Request $request, $id)
    {
        $chofer = Chofer::findOrFail($id);

        $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'dni' => 'required|string|max:10|unique:choferes,dni,' . $chofer->id,
            'licencia' => 'nullable|string|max:20',
            'telefono' => 'nullable|string|max:20',
            'ruta_asignada' => 'nullable|string|max:100',
            'estado_licencia' => 'nullable|in:Activa,Inactiva,Pendiente',
            'educacion_vial' => 'nullable|in:Aprobado,Pendiente,Reprobado',
        ]);

        $chofer->update($request->all());

        return back()->with('success', '✏ Chofer actualizado correctamente');
    }

    /**
     * Eliminar chofer
     */
    public function destroy($id)
    {
        Chofer::findOrFail($id)->delete();
        return back()->with('success', '🗑 Chofer eliminado correctamente');
    }
}