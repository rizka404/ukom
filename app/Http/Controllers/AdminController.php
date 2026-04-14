<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function dashboard(): View
    {
        // Statistik
        $total = Pengaduan::count();
        $proses = Pengaduan::where('status', 'verifikasi')->count();
        $selesai = Pengaduan::where('status', 'selesai')->count();

        // Ambil data terbaru
        $pengaduans = Pengaduan::latest()->take(5)->get();

        return view('admin.admin', compact('total', 'proses', 'selesai', 'pengaduans'));
    }

    public function updateStatus($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        $pengaduan->status = 'selesai';
        $pengaduan->save();

        return back()->with('success', 'Status diupdate');
    }

    public function manajemen(Request $request)
{
    $search = $request->search;

    // ambil user + search
    $users = User::when($search, function ($query, $search) {
        return $query->where('username', 'like', "%$search%")
                     ->orWhere('email', 'like', "%$search%");
    })->latest()->get();

    return view('admin.manajemen', compact('users', 'search'));
}

public function notifikasi(Request $request)
{
    $query = \App\Models\Pengaduan::query();

    if ($request->search) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    $pengaduans = $query->latest()->get();

    return view('admin.notifikasi', compact('pengaduans'));
}
}
