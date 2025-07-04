<?php

namespace App\Http\Controllers;

use App\Models\devisi;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class DevisiController extends Controller
{
    public function index()
    {
        $devisi = devisi::all();
        return view('devisi.index', compact('devisi'));
    }

    public function create()
    {

        return view('devisi.create'); // kirim ke view
    }

    public function store(Request $request)
    {
        $request->validate(['nama_devisi' => 'required']);
        devisi::create($request->all());
        return redirect()->route('superadmin.devisi.index')->with('success', 'Devisi Terbuat');
    }

    public function show(devisi $devisi)
    {
        return view('superadmin.devisi.show', compact('devisi'));
    }

    public function edit(devisi $devisi)
    {
        return view('devisi.edit', compact('devisi'));
    }


    public function update(Request $request, devisi $devisi)
    {
        $request->validate(['nama_devisi' => 'required']);
        $devisi->update($request->all());
        return redirect()->route('superadmin.devisi.index')->with('success', 'Devisi updated');
    }

    public function destroy(devisi $devisi)
    {
        $devisi->delete();
        return redirect()->route('superadmin.devisi.index')->with('success', 'Devisi deleted');
    }
}
