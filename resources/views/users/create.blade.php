@extends('layouts.mantis')

@section('content')
@if(auth()->user()->role === 'superadmin')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Form Data Admin Perusahaan</h4>
            <div>
                <a href="{{route('superadmin.users.index')}}">Kembali</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('superadmin.users.store')}}" method="POST" class="">
                @csrf
                <div class="fore-grup my-2">
                    <label for="name">Nama Pegawai</label>
                    <input type="text" name="name" id="name" class="form-control" autofocus>
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="fore-grup my-2">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                    @error('email')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="fore-grup my-2">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" class="form-control">
                    @error('password')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="fore-grup my-2">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="text" name="password_confirmation" id="password_confirmation" class="form-control">
                    @error('password_confirmation')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="fore-grup my-2">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="fore-grup my-2">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
                    @error('tanggal_lahir')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="fore-grup my-2">
                    <label for="phone">No. Telepon</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                    @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-select">
                        <option value=""> Pilih role </option>
                        <option value="admin" {{old('role')== 'admin' ? 'selected': ''}}>Admin</option>
                    </select>
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
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="3"></textarea>
                    @error('alamat')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="fore-grup my-2">
                    <button class="btn btn-primary">Simpan Data</button>
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
            <h4 class="card-title">Form Data karyawan</h4>
            <div>
                <a href="{{route('admin.users.index')}}">Kembali</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.users.store')}}" method="POST" class="">
                @csrf
                <div class="fore-grup my-2">
                    <label for="name">Nama Pegawai</label>
                    <input type="text" name="name" id="name" class="form-control" autofocus>
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="fore-grup my-2">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                    @error('email')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="fore-grup my-2">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" class="form-control">
                    @error('password')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="fore-grup my-2">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="text" name="password_confirmation" id="password_confirmation" class="form-control">
                    @error('password_confirmation')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="fore-grup my-2">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="fore-grup my-2">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
                    @error('tanggal_lahir')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="fore-grup my-2">
                    <label for="phone">Nomor Telpon</label>
                    <input type="text" name="phone" id="phone" class="form-control" autofocus>
                    @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="3"></textarea>
                    @error('alamat')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-select">
                        <option value=""> Pilih role </option>
                        <option value="karyawan" {{old('role')== 'karyawan' ? 'selected': ''}}>Karyawan</option>
                    </select>
                </div>
                <div class="form-group my-2">
                    <label for="devisi_id">Departemen/ Divisi</label>
                    <select name="devisi_id" id="devisi_id" class="form-select">
                        <option value=""> Pilih Divisi </option>
                        @foreach ($devisis as $devisi)
                        <option value="{{$devisi->id}}" {{old('devisi_id')== $devisi->id ? 'selected': ''}}>{{$devisi->nama_devisi}}</option> @endforeach
                    </select>
                </div>
                <div class="fore-grup my-2">
                    <button class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection