<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\View\View;

class InfoController extends Controller
{
    public function index(): View
    {
        // ambil data pengaduan terbaru
        $pengaduans = Pengaduan::latest()->get();

        return view('info', compact('pengaduans'));
    }
}
