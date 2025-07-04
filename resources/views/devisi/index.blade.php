@extends('layouts.mantis')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h4 class="card-title m-0">Data Devisi / Departemen Perusahaan</h4>
      <a href="{{ route('superadmin.devisi.create') }}" class="btn btn-primary">Tambah Departemen</a>
    </div>
    <div class="card-body">
      <table class="table table-bordered" id="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Devisi / Departemen</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($devisi as $index => $item)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->nama_devisi }}</td>
            <td>
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                  Aksi
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('superadmin.devisi.edit', $item->id) }}">Edit</a></li>
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

@foreach ($devisi as $item)
<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="confirmDeleteDataModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title text-dark">Konfirmasi Penghapusan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        Anda yakin ingin menghapus <strong>{{ $item->nama_devisi }}</strong>?<br>
        Data ini akan dihapus secara permanen.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <form action="{{ route('superadmin.devisi.destroy', $item->id) }}" method="POST">
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