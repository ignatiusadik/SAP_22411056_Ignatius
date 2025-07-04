@extends('layouts.mantis')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h4 class="card-title">Form Devisi/ Departemen Perusahaan</h4>
      <div>
        <a href="{{route('superadmin.devisi.index')}}">Kembali</a>
      </div>
    </div>
    <div class="card-body">
      <form action="{{route('superadmin.devisi.store')}}" method="POST" class="">
        @csrf

        <div class="fore-grup my-2">
          <label for="nama_devisi">Nama Devisi/ Departemen</label>
          <input type="text" name="nama_devisi" id="nama_devisi" class="form-control" autofocus>
          @error('nama_devisi')
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