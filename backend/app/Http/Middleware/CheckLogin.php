<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($this->isUserAuthenticated()){

            return $next($request);
        }
        return to_route('login')->with('login', 'Veuillez vous connecter');
    }

    private function isUserAuthenticated(): bool
    {
        return session()->has('utilisateur');
    }
}
