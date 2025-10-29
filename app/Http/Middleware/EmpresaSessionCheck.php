<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EmpresaSessionCheck
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('empresa_id')) {
            return redirect()->route('empresa.login')
                ->withErrors(['error' => 'Debes iniciar sesión para continuar.']);
        }

        if ($request->route('id') && $request->route('id') != session('empresa_id')) {
            abort(403, 'No puedes acceder al panel de otra empresa.');
        }

        return $next($request);
    }
}
