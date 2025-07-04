@extends('layouts.mantis')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="m-0">Konfirmasi Pengajuan Cuti Karyawan</h5>
    </div>
    <div class="card-body">
      <table class="table table-bordered" id="table">
        <thead>
          <tr>
            <th style="width: 50px;">No</th>
            <th>Nama Karyawan</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Alasan</th>
            <th>Status</th>
            <th class="text-center" style="width: 200px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($cutis as $index => $cuti)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $cuti->user->name ?? '-' }}</td>
            <td>{{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->translatedFormat('d F Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->translatedFormat('d F Y') }}</td>
            <td>{{ $cuti->alasan }}</td>
            <td class="text-center">
              @if($cuti->status == 'pending')
              <span class="badge bg-warning text-dark px-3 py-2">Pending</span>
              @elseif($cuti->status == 'approved')
              <span class="badge bg-success px-3 py-2">Disetujui</span>
              @else
              <span class="badge bg-danger px-3 py-2">Ditolak</span>
              @endif
            </td>
            <td class="text-center">
              @if($cuti->status == 'pending')
              <div class="d-flex justify-content-center gap-1 flex-wrap">
                <form action="{{ route('admin.cuti.confirm', $cuti->id) }}" method="POST">
                  @csrf
                  <input type="hidden" name="action" value="approve">
                  <button type="submit" class="btn btn-sm btn-success">Setujui</button>
                </form>
                <form action="{{ route('admin.cuti.confirm', $cuti->id) }}" method="POST">
                  @csrf
                  <input type="hidden" name="action" value="reject">
                  <button type="submit" class="btn btn-sm btn-danger">Tolak</button>
                </form>
              </div>
              @else
              <button type="button" class="btn btn-sm btn-primary" disabled>Sudah Diproses</button>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection