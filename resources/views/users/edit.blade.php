@extends('layouts.mantis')

@section('content')
@if(auth()->user()->role === 'superadmin')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Form Edit Data Admin Perusahaan</h4>
            <div>
                <a href="{{ route('superadmin.users.index') }}">Kembali</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('superadmin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group my-2">
                    <label for="name">Nama Pegawai</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $user->name) }}" autofocus>
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $user->email) }}">
                    @error('email')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="password">Password (Opsional)</label>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Kosongkan jika tidak ingin mengganti password">
                    @error('password')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        placeholder="Ulangi password baru jika diubah">
                    @error('password_confirmation')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin"
                        class="form-control @error('jenis_kelamin') is-invalid @enderror">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="laki-laki" {{ old('jenis_kelamin', $user->jenis_kelamin ?? '') == 'laki-laki' ? 'selected' : '' }}>laki-laki</option>
                        <option value="perempuan" {{ old('jenis_kelamin', $user->jenis_kelamin ?? '') == 'perempuan' ? 'selected' : '' }}>perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                        value="{{ old('tanggal_lahir', $user->tanggal_lahir ?? '') }}">
                    @error('tanggal_lahir')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="phone">No. Telepon</label>
                    <input type="text" name="phone" id="phone"
                        class="form-control @error('phone') is-invalid @enderror"
                        value="{{ old('phone', $user->phone ?? '') }}">
                    @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3"
                        class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $user->alamat ?? '') }}</textarea>
                    @error('alamat')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="perusahaan_id">Perusahaan</label>
                    <select id="perusahaan_id" name="perusahaan_id" class="form-select">
                        <option value="">-- Pilih Perusahaan --</option>
                        @foreach ($perusahaans as $perusahaan)
                        <option value="{{ $perusahaan->id }}" {{ old('perusahaan_id') == $perusahaan->id ? 'selected' : '' }}>
                            {{ $perusahaan->nama_perusahaan }}
                        </option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group my-2">
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endif

@if(auth()->user()->role === 'admin')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Form Edit Data Karyawan</h4>
            <div>
                <a href="{{ route('admin.users.index') }}">Kembali</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group my-2">
                    <label for="name">Nama Pegawai</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $user->name) }}" autofocus>
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $user->email) }}">
                    @error('email')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="password">Password (Opsional)</label>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Kosongkan jika tidak ingin mengganti password">
                    @error('password')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        placeholder="Ulangi password baru jika diubah">
                    @error('password_confirmation')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin"
                        class="form-control @error('jenis_kelamin') is-invalid @enderror">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="laki-laki" {{ old('jenis_kelamin', $user->jenis_kelamin ?? '') == 'laki-laki' ? 'selected' : '' }}>laki-laki</option>
                        <option value="perempuan" {{ old('jenis_kelamin', $user->jenis_kelamin ?? '') == 'perempuan' ? 'selected' : '' }}>perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                        value="{{ old('tanggal_lahir', $user->tanggal_lahir ?? '') }}">
                    @error('tanggal_lahir')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="phone">No. Telepon</label>
                    <input type="text" name="phone" id="phone"
                        class="form-control @error('phone') is-invalid @enderror"
                        value="{{ old('phone', $user->phone ?? '') }}">
                    @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="devisi_id">Departemen/ Divisi</label>
                    <select name="devisi_id" id="devisi_id" class="form-select">
                        <option value=""> Pilih Divisi </option>
                        @foreach ($devisis as $devisi)
                        <option value="{{$devisi->id}}" {{old('devisi_id')== $devisi->id ? 'selected': ''}}>{{$devisi->nama_devisi}}</option> @endforeach
                    </select>
                </div>
                <div class="form-group my-2">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3"
                        class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $user->alamat ?? '') }}</textarea>
                    @error('alamat')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endif


@endsection