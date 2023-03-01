<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cetak Data</title>
  <style>
    body {
      text-align: center;
    }
  </style>
</head>
<body>
  
  <h3>
    Laporan Data Jemaat Gereja HKBP Bethel Resort Padang Bulan Distrik X-MA
    <br>
    Jalan Besar Tanjung Selamat No.168 Deli Serdang
  </h3>
  <table border="1px solid #000" cellspacing="0" cellpadding="10px" style="width: 100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Keluarga</th>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>Tempat Lahir</th>
        <th>Jenis Kelamin</th>
        <th>No.Hanphone</th>
        <th>Alamat</th>
        <th>Status Keluarga</th>
        <th>Status Anak</th>
        <th>Pendidikan</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @php
        $i = 1;  
      @endphp
      @foreach ($datas as $data)
        <tr>
          <th>{{ $i++ }}</th>
          <td>{{ $data->families->keluarga }}</td>
          <td>{{ $data->nama }}</td>
          <td>{{ $data->tgl_lahir }}</td>
          <td>{{ $data->tempat_lahir }}</td>
          <td>{{ $data->jenis_kelamin }}</td>
          <td>{{ $data->no_hp }}</td>
          <td>{{ $data->alamat }}</td>
          <td>{{ $data->status_keluarga }}</td>
          <td>{{ $data->status_anak }}</td>
          <td>{{ $data->pendidikan }}</td>
          <td>{{ $data->status }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>