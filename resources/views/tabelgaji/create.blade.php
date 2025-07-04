@extends('layouts.mantis')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h4 class="card-title">Daftar Gaji Pokok Berdasarkan Departemen</h4>
      <div>
        <a href="{{route('admin.tabelgaji.index')}}">Kembali</a>
      </div>
    </div>
    <div class="card-body">
      <form action="{{route('admin.tabelgaji.store')}}" method="POST" class="">
        @csrf

        <div class="form-group my-2">
          <label for="nama_devisi">Nama Devisi/ Departemen</label>
          <select id="nama_devisi" name="id_devisi" class="form-select">
            <option value="">-- Pilih Devisi --</option>
            @foreach ($devisis as $devisi)
            <option value="{{ $devisi->id }}" {{ old('id_devisi') == $devisi->id ? 'selected' : '' }}>
              {{ $devisi->nama_devisi }}
            </option>
            @endforeach
          </select>
          @error('id_devisi')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group my-2">
          <label for="gaji_pokok">Gaji Pokok</label>
          <input
            type="number"
            name="gaji_pokok"
            id="gaji_pokok"
            class="form-control"
            min="0"
            step="0.01"
            autofocus>
          @error('gaji_pokok')
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