@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <div class="card p-4 shadow-sm">
    <div class="text-center bg-gradient-to-b from-blue-300 to-blue-600 py-5 rounded-top">
      <div class="d-flex justify-content-center">
        <div class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center" style="width: 70px; height: 70px; font-size: 32px;">
          {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>
      </div>
      <h4 class="mt-2 text-white">{{ strtoupper(Auth::user()->name) }}</h4>
      <p class="text-white-50">{{ Auth::user()->username ?? 'NIS/NIP/NIK' }}</p>
    </div>

    <div class="card-body">
      <ul class="nav nav-tabs mb-4">
        <li class="nav-item">
          <a class="nav-link active" href="#">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Update Akun</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ubah Password</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Profiling</a>
        </li>
      </ul>

      <div class="row">
        <div class="col-md-6">
          <p><strong>#</strong> {{ $user->nik }}</p>
          <p><i class="bi bi-geo-alt-fill"></i> {{ $user->alamat }}</p>
          <p><i class="bi bi-telephone"></i> {{ $user->no_hp }}</p>
          <p><i class="bi bi-send"></i> {{ $user->tempat_lahir }}, {{ \Carbon\Carbon::parse($user->tanggal_lahir)->translatedFormat('d F Y') }}</p>
          <p><i class="bi bi-gender-male"></i> {{ $user->jenis_kelamin }}</p>
        </div>

        <div class="col-md-6">
          <h5>Other Profile</h5>
          <p>Nomor WA Wali<br><strong>{{ $user->wa_wali }}</strong></p>
          <p>Nama Ibu<br><strong>{{ strtoupper($user->nama_ibu) }}</strong></p>
          <p>Agama<br><strong>{{ $user->agama }}</strong></p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection