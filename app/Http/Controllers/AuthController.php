<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function registrationForm()
    {
        return view('dashboard.registration');
    }

    public function registration(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::create($validate);

        if ($user) {
            return redirect()->route('loginForm')->with('success', 'Account Created');
        }
    }

    public function loginForm()
    {
        return view('dashboard.login');
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirect based on role after login
            return match ($user->role) {
                'super_admin', 'admin' => redirect()->route('dashboard'),
                'doctor' => redirect()->route('doctor.dashboard'),
                'patient' => redirect()->route('patient.dashboard'),
                default => redirect()->route('loginForm')->with('error', 'Invalid role.'),
            };
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }
    public function viewDashboard()
    {
        return view('dashboard.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginForm');
    }
}
