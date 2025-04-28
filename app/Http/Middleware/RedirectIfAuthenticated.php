<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Redirect logged-in users to their dashboards based on role
            return match ($user->role) {
                'super_admin', 'admin' => redirect()->route('dashboard'),
                'doctor' => redirect()->route('doctor.dashboard'),
                'patient' => redirect()->route('patient.dashboard'),
                default => redirect()->route('dashboard'),
            };
        }

        return $next($request); // Allow unauthenticated users to proceed
    }
}
