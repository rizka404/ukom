<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\User;

class AuthController extends Controller
{
    // ================= LOGIN =================

    public function index(): View
    {
        return view('login');
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $login = $request->email;
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([
            $field => $login,
            'password' => $request->password
        ])) {
            $request->session()->regenerate();

            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email/Username atau password salah!'
        ])->withInput();
    }

    // ================= REGISTER =================

    public function showRegister(): View
    {
        return view('register');
    }

    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => 'required|min:3|max:50',
            'jurusan' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        User::create([
            'username' => $request->username,
            'jurusan' => $request->jurusan,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'siswa'
        ]);

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil!');
    }

    // ================= LOGOUT =================

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
