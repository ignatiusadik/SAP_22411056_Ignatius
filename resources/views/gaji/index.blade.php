@extends('layouts.mantis')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h4 class="card-title m-0">Data Gaji Karyawan</h4>
      <a href="{{ route('admin.gaji.create') }}" class="btn btn-primary">Tambah Daftar Gaji</a>
    </div>
    <div class="card-body">
      <table class="table table-bordered" id="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Karyawan</th>
            <th>Departemen</th>
            <th>Gaji Pokok</th>
            <th>Tunjangan</th>
            <th>Transport</th>
            <th>Bonus</th>
            <th>Total</th>
            <th>Status</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($gajis as $index => $gaji)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $gaji->user->name ?? '-' }}</td>
            <td>{{ $gaji->user->devisi->nama_devisi ?? '-' }}</td>
            <td>Rp {{ number_format($gaji->gaji_pokok, 0, ',', '.') }}</td>
            <td>Rp {{ number_format($gaji->tunjangan, 0, ',', '.') }}</td>
            <td>Rp {{ number_format($gaji->transport, 0, ',', '.') }}</td>
            <td>Rp {{ number_format($gaji->bonus, 0, ',', '.') }}</td>
            <td>Rp {{ number_format($gaji->total_gaji, 0, ',', '.') }}</td>
            <td>
              @if($gaji->status === 'paid')
              <button class="btn btn-sm btn-success w-100" disabled>Dibayar</button>
              @else
              <button class="btn btn-sm btn-warning w-100 text-dark" disabled>Pending</button>
              @endif
            </td>
            <td>
              @if($gaji->status === 'pending')
              <!-- Tombol buka modal -->
              <button type="button" class="btn btn-sm btn-success w-100" data-bs-toggle="modal" data-bs-target="#modalApprove{{ $gaji->id }}">
                <i class="mdi mdi-check"></i> Approve
              </button>

              <!-- Modal -->
              <div class="modal fade" id="modalApprove{{ $gaji->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $gaji->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header bg-warning">
                      <h5 class="modal-title text-dark" id="modalLabel{{ $gaji->id }}">Konfirmasi Status Pembayaran</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                      Ubah status pembayaran untuk <strong>{{ $gaji->user->name }}</strong> menjadi <strong>Dibayar</strong>?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <form action="{{ route('gaji.toggleStatus', $gaji->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success">Ya, Ubah</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              @else
              <button type="button" class="btn btn-sm btn-danger w-100" disabled>
                <i class="mdi mdi-check"></i> Accept
              </button>
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