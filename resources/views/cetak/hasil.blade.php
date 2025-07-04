<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Cetak Gaji</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      margin-top: 20px;
    }

    th,
    td {
      border: 1px solid #000;
      padding: 8px;
      text-align: left;
    }
  </style>
</head>

<body>
  <h3>Daftar Gaji Bulan {{ \Carbon\Carbon::create()->month($bulan)->locale('id')->monthName }} {{ $tahun }}</h3>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Karyawan</th>
        <th>Departemen</th>
        <th>Gaji Pokok</th>
        <th>Tunjangan</th>
        <th>Transport</th>
        <th>Bonus</th>
        <th>Total Gaji</th>
        <th>Tanggal Dibayar</th>
      </tr>
    </thead>
    <tbody>
      @foreach($gajis as $i => $gaji)
      <tr>
        <td>{{ $i + 1 }}</td>
        <td>{{ $gaji->user->name }}</td>
        <td>Rp {{ number_format($gaji->jumlah, 0, ',', '.') }}</td>
        <td>{{ \Carbon\Carbon::parse($gaji->tanggal_gaji)->translatedFormat('d F Y') }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>