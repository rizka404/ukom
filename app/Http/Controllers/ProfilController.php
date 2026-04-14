<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\View\View;

class ProfilController extends Controller
{
    // TAMPILKAN PROFIL
   public function index()
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login');
    }

    return view('profil', compact('user'));
}

    // UPDATE PROFIL
   public function update(Request $request): RedirectResponse
{
    $request->validate([
        'username' => 'required',
        'email' => 'required|email',
        'jurusan' => 'required'
    ]);

    $user = Auth::user();
/** @var User $user */

    $user->update([
        'username' => $request->username,
        'email' => $request->email,
        'jurusan' => $request->jurusan
    ]);

    return back()->with('success', 'Profil berhasil diupdate!');
}
}
