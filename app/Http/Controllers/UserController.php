<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Perusahaan;
use App\Models\Devisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $authUser = auth()->user();

        if ($authUser->role === 'superadmin') {
            $users = User::with(['perusahaan', 'devisi'])
                ->where('role', 'admin')
                ->get();
        } elseif ($authUser->role === 'admin') {
            $users = User::with(['perusahaan', 'devisi'])
                ->where('perusahaan_id', $authUser->perusahaan_id)
                ->whereIn('role', ['karyawan'])
                ->get();
        } else {
            abort(403);
        }

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $perusahaans = Perusahaan::all();
        $devisis = Devisi::all();
        return view('users.create', compact('perusahaans', 'devisis'));
    }

    public function store(Request $request)
    {
        $authUser = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:superadmin,admin,karyawan',
            'devisi_id' => 'nullable|exists:devisis,id',
            'phone' => 'nullable|string|max:20',
            'jenis_kelamin' => 'nullable|in:laki-laki,perempuan',
            'alamat' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
        ]);

        if ($authUser->role === 'superadmin') {
            $request->validate([
                'perusahaan_id' => 'required|exists:perusahaans,id',
            ]);
            $perusahaanId = $request->perusahaan_id;
        } elseif ($authUser->role === 'admin') {
            if (!in_array($request->role, ['karyawan'])) {
                abort(403, 'Admin hanya boleh membuat user dengan role karyawan.');
            }
            $perusahaanId = $authUser->perusahaan_id;
        } else {
            abort(403);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'perusahaan_id' => $perusahaanId,
            'devisi_id' => $request->devisi_id,
            'phone' => $request->phone,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);
        $redirectRoute = $authUser->role === 'superadmin'
            ? 'superadmin.users.index'
            : 'admin.users.index';

        return redirect()->route($redirectRoute)->with('success', 'User berhasil dibuat');
    }

    public function show(User $user)
    {
        $user->load(['perusahaan', 'devisi']);
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $perusahaans = Perusahaan::all();
        $devisis = Devisi::all();
        return view('users.edit', compact('user', 'perusahaans', 'devisis'));
    }

    public function update(Request $request, User $user)
    {
        $authUser = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$user->id}",
            'password' => 'nullable|string|min:6|confirmed',
            'perusahaan_id' => 'nullable|exists:perusahaans,id',
            'devisi_id' => 'nullable|exists:devisis,id',
            'phone' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
        ]);

        $data = $request->only([
            'name',
            'email',
            'perusahaan_id',
            'devisi_id',
            'phone',
            'alamat',
            'tanggal_lahir'
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);


        $redirectRoute = $authUser->role === 'superadmin'
            ? 'superadmin.users.index'
            : 'admin.users.index';

        return redirect()->route($redirectRoute)->with('success', 'User berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        $authUser = auth()->user(); // Tambahkan ini

        $user->delete(); // Hapus argumen $data

        $redirectRoute = $authUser->role === 'superadmin'
            ? 'superadmin.users.index'
            : 'admin.users.index';

        return redirect()->route($redirectRoute)->with('success', 'User berhasil dihapus');
    }
}
