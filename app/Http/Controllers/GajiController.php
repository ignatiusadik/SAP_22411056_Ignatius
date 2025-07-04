<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class GajiController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            $perusahaan = $user->perusahaan;

            $gajis = Gaji::with('user.devisi')
                ->whereIn('user_id', User::where('perusahaan_id', $perusahaan->id)->pluck('id'))
                ->get();

            return view('gaji.index', compact('gajis', 'perusahaan'));
        } elseif ($user->role === 'karyawan') {
            $gajis = Gaji::where('user_id', $user->id)
                ->orderByDesc('created_at')
                ->get();

            return view('gaji.index', compact('gajis'));
        }

        abort(403);
    }

    public function create()
    {
        $admin = auth()->user();

        if ($admin->role !== 'admin') {
            abort(403);
        }

        $users = User::with('devisi.gajipokok')
            ->where('perusahaan_id', $admin->perusahaan_id)
            ->where('role', 'karyawan')
            ->get();

        return view('gaji.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'    => 'required|exists:users,id',
            'bulan'      => 'required|string|max:20',
            'tahun'      => 'required|numeric',
            'gaji_pokok' => 'required|numeric',
            'tunjangan'  => 'nullable|numeric',
            'transport'  => 'nullable|numeric',
            'bonus'      => 'nullable|numeric',
        ]);

        $totalGaji = $request->gaji_pokok + ($request->tunjangan ?? 0) + ($request->transport ?? 0) + ($request->bonus ?? 0);

        Gaji::create([
            'user_id'    => $request->user_id,
            'bulan'      => $request->bulan,
            'tahun'      => $request->tahun,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan'  => $request->tunjangan ?? 0,
            'transport'  => $request->transport ?? 0,
            'bonus'      => $request->bonus ?? 0,
            'total_gaji' => $totalGaji,
            'status'     => 'pending',
        ]);

        return redirect()->route('admin.gaji.index')->with('success', 'Data gaji berhasil ditambahkan.');
    }

    public function show(Gaji $gaji)
    {
        $this->authorizeGaji($gaji);
        return view('gaji.show', compact('gaji'));
    }

    public function edit(Gaji $gaji)
    {
        $this->authorizeGaji($gaji);

        $admin = auth()->user();
        $users = User::with('devisi.gajipokok')
            ->where('perusahaan_id', $admin->perusahaan_id)
            ->where('role', 'karyawan')
            ->get();

        return view('gaji.edit', compact('gaji', 'users'));
    }

    public function update(Request $request, Gaji $gaji)
    {
        $this->authorizeGaji($gaji);

        $request->validate([
            'user_id'    => 'required|exists:users,id',
            'bulan'      => 'required|string|max:100',
            'tahun'      => 'required|numeric',
            'gaji_pokok' => 'required|numeric',
            'tunjangan'  => 'nullable|numeric',
            'transport'  => 'nullable|numeric',
            'bonus'      => 'nullable|numeric',
            'status'     => 'required|string|max:20',
        ]);

        $totalGaji = $request->gaji_pokok + ($request->tunjangan ?? 0) + ($request->transport ?? 0) + ($request->bonus ?? 0);

        $gaji->update([
            'user_id'    => $request->user_id,
            'bulan'      => $request->bulan,
            'tahun'      => $request->tahun,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan'  => $request->tunjangan ?? 0,
            'transport'  => $request->transport ?? 0,
            'bonus'      => $request->bonus ?? 0,
            'total_gaji' => $totalGaji,
            'status'     => $request->status,
        ]);

        return redirect()->route('admin.gaji.index')->with('success', 'Data gaji berhasil diperbarui.');
    }

    public function destroy(Gaji $gaji)
    {
        $this->authorizeGaji($gaji);
        $gaji->delete();

        return redirect()->route('admin.gaji.index')->with('success', 'Data gaji berhasil dihapus.');
    }

    public function toggleStatus(Gaji $gaji)
    {
        $gaji->status = $gaji->status === 'paid' ? 'pending' : 'paid';
        $gaji->save();

        return redirect()->back()->with('success', 'Status pembayaran diperbarui.');
    }

    public function cetak($id)
    {
        $gaji = Gaji::with('user')->findOrFail($id);
        $this->authorizeGaji($gaji);

        return view('gaji.cetak', compact('gaji'));
    }

    public function cetakPdf($id)
    {
        $gaji = Gaji::with('user')->findOrFail($id);
        $this->authorizeGaji($gaji);

        $pdf = Pdf::loadView('gaji.cetak-pdf', compact('gaji'));
        return $pdf->stream('slip-gaji-' . $gaji->user->name . '.pdf');
    }

    private function authorizeGaji(Gaji $gaji)
    {
        $user = auth()->user();

        if ($user->role === 'admin' && $gaji->user->perusahaan_id !== $user->perusahaan_id) {
            abort(403);
        } elseif ($user->role === 'karyawan' && $gaji->user_id !== $user->id) {
            abort(403);
        }
    }
}
