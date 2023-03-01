<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cetak Data Sidi</title>
  <style>
    body {
      text-align: center;
    }
  </style>
</head>
<body>
  
  <h3>
    Laporan Data Jemaat Sidi Gereja HKBP Bethel Resort Padang Bulan Distrik X-MA
    <br>
    Jalan Besar Tanjung Selamat No.168 Deli Serdang
  </h3>
  <table border="1px solid #000" cellspacing="0" cellpadding="10px" style="width: 100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Keluarga</th>
        <th>Nama</th>
        <th>Sidi</th>
        <th>Tanggal</th>
        <th>Gereja</th>
        <th>Tahun</th>
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
          <th>{{ $data->sidi }}</th>
          <th>{{ $data->tanggal }}</th>
          <th>{{ $data->gereja }}</th>
          <th>{{ $data->tahun }}</th>
          <th>{{ $data->keterangan }}</th>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>