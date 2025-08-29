<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
  public function handle(Request $request, Closure $next, $role): Response
    {
         if (Auth::check()) {
            // If the user's role matches the required role
            if (Auth::user()->role === $role) {
                return $next($request); // allow access
            }
    }
    return redirect('/')->with('error', 'You do not have permission to access this page.');
    }
}
