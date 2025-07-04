@extends('layouts.mantis')

@section('content')
<div class="container">

  <!-- Form Pengajuan Cuti -->
  <div class="card mb-3">
    <div class="card-header">
      <h5 class="m-0">Ajukan Cuti</h5>
    </div>
    <div class="card-body">
      <form action="{{ route('karyawan.cuti.store') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" required>
          </div>
          <div class="col-12 mb-3">
            <label for="alasan" class="form-label">Alasan</label>
            <textarea name="alasan" id="alasan" rows="3" class="form-control" placeholder="Tuliskan alasan pengajuan cuti" required></textarea>
          </div>
        </div>
        <div class="d-flex justify-content-start">
          <a href="{{ route('karyawan.cuti.index') }}" class="btn btn-danger me-2">Batal</a>
          <button type="submit" class="btn btn-primary">Ajukan</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Riwayat Pengajuan Cuti -->
  <div class="card">
    <div class="card-header">
      <h5 class="m-0">Riwayat Pengajuan Cuti</h5>
    </div>
    <div class="card-body">
      <table class="table table-bordered" id="table">
        <thead>
          <tr>
            <th style="width: 50px;" class="text-center">No</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Alasan</th>
            <th>Status</th>
            <th class="text-center" style="width: 120px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($cutis as $index => $cuti)
          <tr>
            <td class="text-center">{{ $index + 1 }}</td>
            <td>{{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->translatedFormat('d F Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->translatedFormat('d F Y') }}</td>
            <td>{{ $cuti->alasan }}</td>
            <td class="text-center">
              @if($cuti->status == 'pending')
              <button type="button" class="btn btn-sm btn-warning text-dark disabled">Pending</button>
              @elseif($cuti->status == 'approved')
              <button type="button" class="btn btn-sm btn-success disabled">Disetujui</button>
              @else
              <button type="button" class="btn btn-sm btn-danger disabled">Ditolak</button>
              @endif
            </td>
            <td class="text-center">
              <div class="dropdown">
                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                  data-bs-toggle="dropdown"
                  {{ $cuti->status !== 'pending' ? 'disabled title=Status sudah dikonfirmasi' : '' }}>
                  Aksi
                </button>
                @if($cuti->status == 'pending')
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('karyawan.cuti.edit', $cuti->id) }}">Edit</a></li>
                  <li>
                    <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#modalHapusCuti{{ $cuti->id }}">
                      Hapus
                    </button>
                  </li>
                </ul>
                @endif
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Konfirmasi Hapus -->
@foreach($cutis as $cuti)
@if($cuti->status == 'pending')
<div class="modal fade" id="modalHapusCuti{{ $cuti->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title text-dark">Konfirmasi Hapus Pengajuan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        Yakin ingin menghapus pengajuan cuti dari tanggal
        <strong>{{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->translatedFormat('d M Y') }}</strong>
        sampai
        <strong>{{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->translatedFormat('d M Y') }}</strong>?
      </div>
      <div class="modal-footer">
        <form action="{{ route('karyawan.cuti.destroy', $cuti->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Lanjutkan</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endif
@endforeach

@endsection