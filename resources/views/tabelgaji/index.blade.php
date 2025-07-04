@extends('layouts.mantis')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h4 class="card-title m-0">Daftar Gaji Berdasarkan Departemen</h4>
      <a href="{{ route('admin.tabelgaji.create') }}" class="btn btn-primary">Tambah Gaji Pokok</a>
    </div>
    <div class="card-body">
      <table class="table table-bordered" id="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Devisi / Departemen</th>
            <th>Gaji Pokok</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tabelgaji as $index => $item)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->devisi->nama_devisi ?? '-' }}</td>
            <td>Rp. {{ number_format($item->gaji_pokok, 0, ',', '.') }}</td>
            <td>
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                  Aksi
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('admin.tabelgaji.edit', $item->id) }}">Edit</a></li>
                  <li>
                    <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteDataModal{{ $item->id }}">
                      Hapus
                    </button>
                  </li>
                </ul>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@foreach ($tabelgaji as $item)
<!-- Modal Hapus -->
<div class="modal fade" id="confirmDeleteDataModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title text-dark">Konfirmasi Penghapusan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        Anda yakin ingin menghapus data gaji untuk <strong>{{ $item->devisi->nama_devisi ?? 'Departemen Tidak Diketahui' }}</strong>?<br>
        Data ini akan dihapus secara permanen.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <form action="{{ route('admin.tabelgaji.destroy', $item->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Lanjutkan</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection