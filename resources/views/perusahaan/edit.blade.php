@extends('layouts.mantis')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h4 class="card-title">Form Data perusahaan</h4>
      <div>
        <a href="{{route('superadmin.perusahaan.index')}}">Kembali</a>
      </div>
    </div>
    <div class="card-body">
      <form action="{{route('superadmin.perusahaan.update', $perusahaan->id)}}" method="POST" class="">
        @csrf
        @method('PUT')
        <div class="form-group my-2">
          <label for="nama_perusahaan">Nama perusahaan</label>
          <input type="text" name="nama_perusahaan" id="nama_perusahaan"
            class="form-control @error('nama_perusahaan') is-invalid @enderror"
            value="{{ $perusahaan->nama_perusahaan }}" autofocus>
          @error('nama_perusahaan')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="fore-grup my-2">
          <label for="email">Email</label>
          <input type="text" name="email" id="email"
            class="form-control @error('nik') is-invalid @enderror"
            value="{{ $perusahaan->email }}">
          @error('email')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="fore-grup my-2">
          <label for="no_tlp">Nomor Telepon</label>
          <input type="text" name="no_tlp" id="no_tlp"
            class="form-control @error('id') is-invalid @enderror"
            value="{{ $perusahaan->no_tlp }}">
          @error('email')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div>
          <label for="alamat">Alamat</label>
          <textarea name="alamat" id="alamat" cols="30" rows="10"
            class="form-control @error('alamat') is-invalid @enderror">
          {{ $perusahaan->alamat }}
          </textarea>
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
@endsection