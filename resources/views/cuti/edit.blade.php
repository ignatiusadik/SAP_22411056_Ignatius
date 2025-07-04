@extends('layouts.mantis')

@section('content')
<div class="container">
  <div class="card mb-4">
    <div class="card-header">
      <h5 class="m-0">Edit Pengajuan Cuti</h5>
    </div>
    <div class="card-body">
      <form action="{{ route('karyawan.cuti.update', $cuti->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control"
              value="{{ old('tanggal_mulai', $cuti->tanggal_mulai) }}" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control"
              value="{{ old('tanggal_selesai', $cuti->tanggal_selesai) }}" required>
          </div>
          <div class="col-12 mb-3">
            <label for="alasan" class="form-label">Alasan</label>
            <textarea name="alasan" id="alasan" rows="3" class="form-control"
              placeholder="Tuliskan alasan pengajuan cuti" required>{{ old('alasan', $cuti->alasan) }}</textarea>
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <a href="{{ route('karyawan.cuti.index') }}" class="btn btn-secondary">Kembali</a>
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection