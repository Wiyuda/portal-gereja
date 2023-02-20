<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cetak Data Kawin</title>
  <style>
    body {
      text-align: center;
    }
  </style>
</head>
<body>
  
  <h3>
    Laporan Data Jemaat Menikah Gereja HKBP Bethel Resort Padang Bulan Distrik X-MA
    <br>
    Jalan Besar Tanjung Selamat No.168 Deli Serdang
    <br>
    Tahun {{ $year }}
  </h3>
  <table border="1px solid #000" cellspacing="0" cellpadding="10px" style="width: 100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Keluarga</th>
        <th>Nama</th>
        <th>Kawin</th>
        <th>Nama Calon</th>
        <th>Asal Gereja Calon</th>
        <th>Tanggal</th>
        <th>Gereja</th>
        <th>Keterangan</th>
      </tr>
    </thead>
    <tbody>
      @php
        $i = 1;  
      @endphp
      @foreach ($datas as $data)
        <tr>
          <th>{{ $i++ }}</th>
          <th>{{ $data->families->keluarga }}</th>
          <th>{{ $data->family_members->nama }}</th>
          <th>{{ $data->kawin }}</th>
          <th>{{ $data->nama_calon }}</th>
          <th>{{ $data->asal_gereja_calon }}</th>
          <th>{{ $data->tanggal }}</th>
          <th>{{ $data->gereja }}</th>
          <th>{{ $data->keterangan }}</th>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>