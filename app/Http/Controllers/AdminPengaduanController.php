<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\View\View;
use Illuminate\Http\Request;

class AdminPengaduanController extends Controller
{
    // TAMPILKAN SEMUA DATA
    public function index(Request $request): View
    {
        $query = Pengaduan::with('user');

        // FILTER STATUS
        if ($request->status && $request->status != 'Semua') {
            $query->where('status', $request->status);
        }

        // SEARCH
        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $pengaduans = $query->latest()->get();
        

        return view('admin.pengaduan', compact('pengaduans'));
    }

    // UPDATE STATUS
    public function updateStatus(Request $request, $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        $pengaduan->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Status berhasil diupdate');
    }
}
