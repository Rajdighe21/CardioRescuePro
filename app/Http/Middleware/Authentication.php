<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('loginForm')->with('error', 'Please log in first.');
        }

        if (in_array(Auth::user()->role, $roles)) {
            return $next($request);
        }

        // Redirect authenticated users without permission to a different page (like dashboard or home)
        return redirect()->route('dashboard')->with('error', 'Unauthorized access.');
    }
}
