<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica si hay un usuario en la sesión
        if (!Session::has('user')) {
            // Si no hay usuario en la sesión, redirige a la página de inicio de sesión
            return redirect('/login')->withErrors(['msg' => 'Debes iniciar sesión para acceder a esta página.']);
        }

        return $next($request);
    }
}