@extends('layouts.mantis')

@section('content')
<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header text-white" style="background-color:rgb(221, 221, 221);">
      <h5 class="mb-0">Cetak Gaji Karyawan</h5>
    </div>
    <div class="card-body">
      <form action="{{ route('karyawan.cetak.gaji') }}" method="GET" target="_blank">
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="bulan" class="form-label">Pilih Bulan</label>
            <select name="bulan" id="bulan" class="form-select" required>
              <option value="">-- Pilih Bulan --</option>
              @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $i => $namaBulan)
              <option value="{{ $i+1 }}">{{ $namaBulan }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-6">
            <label for="tahun" class="form-label">Pilih Tahun</label>
            <input type="number" name="tahun" id="tahun" class="form-control" value="{{ date('Y') }}" required min="2000" max="{{ date('Y')+1 }}">
          </div>
        </div>
        <button type="submit" class="btn btn-success">
          <i class="fas fa-print"></i> Cetak Gaji
        </button>
      </form>
    </div>
  </div>
</div>
@endsection