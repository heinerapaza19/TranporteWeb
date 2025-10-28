<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EmpresaAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('empresa_id')) {
            return redirect()->route('empresa.login');
        }

        return $next($request);
    }
}
