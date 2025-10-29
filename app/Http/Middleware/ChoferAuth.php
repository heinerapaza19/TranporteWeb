<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChoferAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('chofer')->check()) {
            return redirect()->route('chofer.login')->withErrors(['error' => 'Debes iniciar sesión para continuar.']);
        }

        return $next($request);
    }
}
