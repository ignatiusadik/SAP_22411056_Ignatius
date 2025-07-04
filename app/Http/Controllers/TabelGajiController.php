<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GajiPokok;
use App\Models\Devisi;
use App\Models\Perusahaan;

class TabelGajiController extends Controller
{
    /**
     * Menampilkan semua data gaji pokok.
     */
    public function index()
    {
        $tabelgaji = GajiPokok::all();
        return view('tabelgaji.index', compact('tabelgaji'));
    }

    /**
     * Menampilkan form tambah data gaji pokok.
     */
    public function create()
    {
        $perusahaans = Perusahaan::all();
        $devisis = Devisi::all();
        return view('tabelgaji.create', compact('perusahaans', 'devisis'));
    }

    /**
     * Simpan data gaji pokok baru.
     */
    public function store(Request $request)
    {
        $authUser = auth()->user();

        $request->validate([
            'gaji_pokok' => 'required|numeric|min:0',
            'id_devisi' => 'required|exists:devisis,id',
        ]);

        if ($authUser->role === 'admin') {
            $perusahaanId = $authUser->perusahaan_id;
        } else {
            abort(403, 'Hanya admin yang boleh menambah data.');
        }

        GajiPokok::create([
            'gaji_pokok' => $request->gaji_pokok,
            'id_devisi' => $request->id_devisi,
            'perusahaan_id' => $perusahaanId, // disimpan
        ]);

        return redirect()->route('admin.tabelgaji.index')->with('success', 'Data gaji berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail gaji pokok tertentu.
     */
    public function show(GajiPokok $tabelgaji)
    {
        return view('tabelgaji.show', compact('tabelgaji'));
    }

    /**
     * Menampilkan form edit data gaji pokok.
     */
    public function edit(GajiPokok $tabelgaji)
    {
        $devisis = Devisi::all();
        return view('tabelgaji.edit', compact('tabelgaji', 'devisis'));
    }

    /**
     * Update data gaji pokok.
     */
    public function update(Request $request, GajiPokok $tabelgaji)
    {
        $request->validate([
            'gaji_pokok' => 'required|numeric|min:0',
        ]);

        $tabelgaji->update([
            'gaji_pokok' => $request->gaji_pokok,
        ]);


        return redirect()->route('admin.tabelgaji.index')->with('success', 'Data gaji berhasil diperbarui.');
    }

    /**
     * Hapus data gaji pokok.
     */
    public function destroy(GajiPokok $tabelgaji)
    {
        $tabelgaji->delete();
        return redirect()->route('admin.tabelgaji.index')->with('success', 'Data gaji berhasil dihapus.');
    }
}
