<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function loginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'max:255', 'regex:/\A[A-Za-z0-9._%+\-]+@[A-Za-z0-9.\-]+\.[A-Za-z]{2,}\z/'],
            'password' => ['required', 'string', 'max:255'],
        ]);

        $credentials['is_active'] = true;

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            // Update last login timestamp
            $user = Auth::guard('admin')->user();
            $user->update(['last_login' => now()]);

            Log::info('Admin login successful', [
                'email' => $credentials['email'],
                'ip' => $request->ip(),
            ]);

            return redirect()->intended(route('admin.dashboard'));
        }

        Log::warning('Admin login failed', [
            'email' => $credentials['email'],
            'ip' => $request->ip(),
            'user_agent' => substr((string) $request->userAgent(), 0, 200),
        ]);

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        $adminEmail = Auth::guard('admin')->user()?->email;

        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Log::info('Admin logout', ['email' => $adminEmail, 'ip' => $request->ip()]);

        return redirect()->route('admin.login');
    }
}
