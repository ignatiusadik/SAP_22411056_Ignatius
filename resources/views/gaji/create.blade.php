@extends('layouts.mantis')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h4 class="card-title">Form Daftar Gaji Karyawan</h4>
      <div>
        <a href="{{ route('admin.gaji.index') }}">Kembali</a>
      </div>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.gaji.store') }}" method="POST">
        @csrf

        {{-- Pilih Karyawan --}}
        <div class="form-group my-2">
          <label for="user_id">Nama Karyawan</label>
          <select name="user_id" id="user_id" class="form-select" onchange="isiDevisiDanGaji()">
            <option value="">Pilih Karyawan</option>
            @foreach ($users as $user)
            <option
              value="{{ $user->id }}"
              data-devisi="{{ $user->devisi->nama_devisi ?? '' }}"
              data-gaji_pokok="{{ $user->devisi->gajipokok->gaji_pokok ?? 0 }}"
              {{ old('user_id') == $user->id ? 'selected' : '' }}>
              {{ $user->name }}
            </option>
            @endforeach
          </select>
          @error('user_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        {{-- Nama Devisi --}}
        <div class="form-group my-2">
          <label for="nama_devisi">Departemen / Divisi</label>
          <input type="text" id="nama_devisi" class="form-control" readonly>
        </div>

        {{-- Bulan --}}
        <div class="form-group my-2">
          <label for="bulan">Bulan</label>
          <select name="bulan" id="bulan" class="form-control">
            <option value="">-- Pilih Bulan --</option>
            @foreach([
            '01'=>'Januari', '02'=>'Februari', '03'=>'Maret', '04'=>'April',
            '05'=>'Mei', '06'=>'Juni', '07'=>'Juli', '08'=>'Agustus',
            '09'=>'September', '10'=>'Oktober', '11'=>'November', '12'=>'Desember'
            ] as $key => $label)
            <option value="{{ $key }}" {{ old('bulan') == $key ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
          </select>
          @error('bulan') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        {{-- Tahun --}}
        <div class="form-group my-2">
          <label for="tahun">Tahun</label>
          <input type="number" name="tahun" id="tahun" class="form-control" min="1900" max="2099" step="1" value="{{ old('tahun') }}">
          @error('tahun') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        {{-- Gaji Pokok --}}
        <div class="form-group my-2">
          <label for="gaji_pokok">Gaji Pokok</label>
          <input type="number" name="gaji_pokok" id="gaji_pokok" class="form-control" readonly>
        </div>

        {{-- Tunjangan, Transport, Bonus --}}
        @foreach(['tunjangan', 'transport', 'bonus'] as $field)
        <div class="form-group my-2">
          <label for="{{ $field }}">{{ ucfirst($field) }}</label>
          <input type="number" name="{{ $field }}" id="{{ $field }}" class="form-control" min="0" oninput="hitungTotal();">
        </div>
        @endforeach

        {{-- Total Gaji (Hanya ditampilkan, tidak dikirim ke controller) --}}
        <div class="form-group my-2">
          <label for="total_gaji">Total Gaji (Otomatis)</label>
          <input type="text" id="total_gaji" class="form-control" readonly>
        </div>

        <div class="form-group my-3">
          <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- JavaScript --}}
<script>
  function isiDevisiDanGaji() {
    const select = document.getElementById('user_id');
    const selected = select.options[select.selectedIndex];
    const devisi = selected.getAttribute('data-devisi');
    const gajiPokok = selected.getAttribute('data-gaji_pokok');

    document.getElementById('nama_devisi').value = devisi || '';
    document.getElementById('gaji_pokok').value = gajiPokok || 0;
    hitungTotal();
  }

  function hitungTotal() {
    const gajiPokok = parseInt(document.getElementById('gaji_pokok').value) || 0;
    const tunjangan = parseInt(document.getElementById('tunjangan').value) || 0;
    const transport = parseInt(document.getElementById('transport').value) || 0;
    const bonus = parseInt(document.getElementById('bonus').value) || 0;

    const total = gajiPokok + tunjangan + transport + bonus;
    document.getElementById('total_gaji').value = total.toLocaleString('id-ID');
  }
</script>
@endsection