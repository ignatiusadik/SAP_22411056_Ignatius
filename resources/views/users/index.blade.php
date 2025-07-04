@extends('layouts.mantis')

@section('content')
<div class="container">
    @if(auth()->user()->role === 'superadmin')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title m-0">Data Admin Perusahaan</h4>
            <a href="{{ route('superadmin.users.create') }}" class="btn btn-primary">Tambah Admin Perusahaan</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Admin</th>
                        <th>Perusahaan</th>
                        <th>Jenis Kelamin</th>
                        <th>Email</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->perusahaan->nama_perusahaan ?? '-' }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_lahir)->locale('id')->translatedFormat('d F Y') }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    Aksi
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('superadmin.users.edit', $item->id) }}">Edit</a></li>
                                    <li>
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $item->id }}">
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

    @foreach ($users as $item)
    <!-- Modal Hapus Superadmin -->
    <div class="modal fade" id="confirmDeleteModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title text-dark">Konfirmasi Penghapusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Anda yakin ingin menghapus <strong>{{ $item->name }}</strong>? Data ini akan hilang secara permanen.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form action="{{ route('superadmin.users.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Lanjutkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endforeach

    @elseif(auth()->user()->role === 'admin')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title m-0">Data Karyawan</h4>
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Tambah Karyawan</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Karyawan</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_lahir)->locale('id')->translatedFormat('d F Y') }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    Aksi
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('admin.users.edit', $item->id) }}">Edit</a></li>
                                    <li>
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $item->id }}">
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

    @foreach ($users as $item)
    <!-- Modal Hapus Admin -->
    <div class="modal fade" id="confirmDeleteModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title text-dark">Konfirmasi Penghapusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Anda yakin ingin menghapus <strong>{{ $item->name }}</strong>? Data ini akan hilang secara permanen.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form action="{{ route('admin.users.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Lanjutkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endforeach

    @endif
</div>
@endsection