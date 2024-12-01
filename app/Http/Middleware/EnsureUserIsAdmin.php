<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Vérifier si l'utilisateur est authentifié et administrateur
         if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request); // Continuer si c'est un admin
        }

        // Rediriger ou retourner une erreur si l'utilisateur n'est pas admin
        return redirect('/')->with('error', 'Accès refusé. Vous devez être administrateur.');
    }
}
