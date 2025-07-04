<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gaji;

class CetakGajiController extends Controller
{
    public function hasil(Request $request)
    {
        $request->validate([
            'bulan' => 'required|numeric|min:1|max:12',
            'tahun' => 'required|numeric|min:2000|max:' . (date('Y') + 1),
        ]);

        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $gajis = Gaji::with('user')
            ->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->get();

        return view('cetak.hasil', compact('gajis', 'bulan', 'tahun'));
    }
}
