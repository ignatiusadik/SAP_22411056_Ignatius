<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CutiKaryawanController extends Controller
{
    public function index()
    {
        $cutis = Cuti::where('user_id', Auth::id())->latest()->get();
        return view('cuti.index', compact('cutis'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|string|max:255',
        ]);

        Cuti::create([
            'user_id' => Auth::id(),
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'alasan' => $request->alasan,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Pengajuan cuti berhasil dikirim.');
    }

    public function edit($id)
    {
        $cuti = Cuti::where('user_id', Auth::id())->findOrFail($id);

        if ($cuti->status !== 'pending') {
            return redirect()->route('karyawan.cuti.index')->with('error', 'Cuti tidak dapat diedit.');
        }

        return view('cuti.edit', compact('cuti'));
    }

    public function update(Request $request, $id)
    {
        $cuti = Cuti::where('user_id', Auth::id())->findOrFail($id);

        if ($cuti->status !== 'pending') {
            return redirect()->route('karyawan.cuti.index')->with('error', 'Cuti tidak dapat diubah.');
        }

        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|string|max:255',
        ]);

        $cuti->update($request->only(['tanggal_mulai', 'tanggal_selesai', 'alasan']));

        return redirect()->route('karyawan.cuti.index')->with('success', 'Pengajuan cuti berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $cuti = Cuti::where('user_id', Auth::id())->findOrFail($id);

        if ($cuti->status !== 'pending') {
            return redirect()->route('karyawan.cuti.index')->with('error', 'Cuti tidak dapat dihapus.');
        }

        $cuti->delete();

        return redirect()->route('karyawan.cuti.index')->with('success', 'Pengajuan cuti berhasil dihapus.');
    }
}
