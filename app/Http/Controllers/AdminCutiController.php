<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;

class AdminCutiController extends Controller
{
    public function index()
    {
        $cutis = \App\Models\Cuti::with('user')->latest()->get();
        return view('admin.cuti.index', compact('cutis'));
    }

    public function confirm(Request $request, $id)
    {
        $cuti = Cuti::findOrFail($id);

        if ($cuti->status !== 'pending') {
            return redirect()->back()->with('error', 'Status cuti sudah dikonfirmasi.');
        }

        if ($request->action == 'approve') {
            $cuti->update(['status' => 'approved']);
            return redirect()->back()->with('success', 'Cuti telah disetujui.');
        }

        if ($request->action == 'reject') {
            $cuti->update(['status' => 'rejected']);
            return redirect()->back()->with('success', 'Cuti telah ditolak.');
        }

        return redirect()->back()->with('error', 'Aksi tidak valid.');
    }
}
