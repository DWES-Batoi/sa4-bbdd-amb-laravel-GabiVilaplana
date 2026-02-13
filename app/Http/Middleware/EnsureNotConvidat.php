<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureNotConvidat
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, $next) {
        if (auth()->check() && auth()->user()->role === \App\Models\User::ROLE_CONVIDAT) {
            abort(403, 'Accés denegat: El convidat no pot modificar dades.');
        }
        return $next($request);
    }
}
