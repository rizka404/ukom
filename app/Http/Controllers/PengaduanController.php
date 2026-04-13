<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PengaduanController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index() : View
    {
        //get all pengaduans
        $pengaduans = Pengaduan::latest()->paginate(10);

        //render view with pengaduans
        return view('riwayat', compact('pengaduans'));
    }

    public function create(): View
    {
        return view('form');
    }
/**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'title'       => 'required|min:5',
        'description' => 'required|min:10',
        'date'        => 'required|date'
    ]);

    Pengaduan::create([
        'title'       => $request->title,
        'description' => $request->description,
        'date'        => $request->date,
        'status' => 'verifikasi',
        'user_id'     => Auth::id()
    ]);

    return redirect()->route('riwayat')
        ->with('success', 'Data Berhasil Disimpan!');
}

/**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
{
    $pengaduan = Pengaduan::findOrFail($id);

    return view('showform', compact('pengaduan'));
}
}

