@extends('layouts.mantis')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h4 class="card-title">Form Data Perusahaan</h4>
      <div>
        <a href="{{route('superadmin.perusahaan.index')}}">Kembali</a>
      </div>
    </div>
    <div class="card-body">
      <form action="{{route('superadmin.perusahaan.store')}}" method="POST" class="">
        @csrf
        <div class="fore-grup my-2">
          <label for="nama_perusahaan">Nama Perusahaan</label>
          <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" autofocus>
          @error('nama_perusahaan')
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
          <label for="no_tlp">Nomor Telepon</label>
          <input type="text" name="no_tlp" id="no_tlp" class="form-control">
          @error('no_tlp')
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

        <div class="fore-grup my-2">
          <button class="btn btn-primary">Simpan Data</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection