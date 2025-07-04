<?php

namespace App\Http\Controllers;


use App\Models\perusahaan;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function index()
    {
        $perusahaan = perusahaan::all();
        return view('perusahaan.index', compact('perusahaan'));
    }

    public function create()
    {
        return view('perusahaan.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama_perusahaan' => 'required']);
        perusahaan::create($request->all());
        return redirect()->route('superadmin.perusahaan.index')->with('success', 'Perusahaan Terbuat');
    }

    public function show(perusahaan $perusahaan)
    {
        return view('superadmin.perusahaan.show', compact('perusahaan'));
    }

    public function edit(perusahaan $perusahaan)
    {
        return view('perusahaan.edit', compact('perusahaan'));
    }

    public function update(Request $request, perusahaan $perusahaan)
    {
        $request->validate(['nama_perusahaan' => 'required']);
        $perusahaan->update($request->all());
        return redirect()->route('superadmin.perusahaan.index')->with('success', 'Perusahaan updated');
    }

    public function destroy(perusahaan $perusahaan)
    {
        $perusahaan->delete();
        return redirect()->route('superadmin.perusahaan.index')->with('success', 'Perusahaan deleted');
    }
}
