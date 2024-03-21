<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AccesoAdministrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $blockAccess = true;
        if (Auth::check() && auth()->user()->rol == 'A') {
            $blockAccess = false;
        }
        if ($blockAccess) {
            return redirect('/');
        }
        return $next($request);
    }
}
