<table>
  <thead>
  <tr>
    <th>No</th>
    <th>Registrasi</th>
    <th>WIJK</th>
    <th>Keluarga</th>
    <th>Tanggal Kawin</th>
    <th>Gereja Kawin</th>
    <th>Alamat</th>
    <th>HP</th>
    <th>Nama Anggota</th>
    <th>Jenis Kelamin</th>
    <th>Hubungan Keluarga</th>
    <th>Status Anak</th>
    <th>Tanggal Lahir</th>
    <th>Tempat Lahir</th>
    <th>Status Baptis</th>
    <th>Tanggal Baptis</th>
    <th>Gereja Baptis</th>
    <th>Status Sidi</th>
    <th>Tanggal Sidi</th>
    <th>Gereja Sidi</th>
    <th>Status Keluarga</th>
    <th>Pendidikan</th>
    <th>Status Monding</th>
    <th>Tanggal Monding</th>
  </tr>
  </thead>
  <tbody>
    @php
      $i = 1;
    @endphp
    @foreach($members as $member)
      <tr>
        <th>{{ $i++ }}</th>
        <td>{{ $member->families->no_registrasi }}</td>
        <td>{{ $member->families->sectors->sektor }}</td>
        <td>{{ $member->families->keluarga }}</td>
        <td>{{ !$member->marrieds ? '-' : $member->marrieds->tanggal }}</td>
        <td>{{ !$member->marrieds ? '-' : $member->marrieds->gereja }}</td>
        <td>{{ $member->families->alamat }}</td>
        <td>{{ $member->no_hp }}</td>
        <td>{{ $member->nama }}</td>
        <td>{{ $member->jenis_kelamin }}</td>
        <td>{{ $member->status_keluarga }}</td>
        <td>{{ $member->status_anak }}</td>
        <td>{{ $member->tgl_lahir }}</td>
        <td>{{ $member->tempat_lahir }}</td>
        <td>{{ !$member->baptism ? '-' : $member->baptism->baptis }}</td>
        <td>{{ !$member->baptism ? '-' : $member->baptism->tanggal }}</td>
        <td>{{ !$member->baptism ? '-' : $member->baptism->gereja }}</td>
        <td>{{ !$member->sidis ? '-' : $member->sidis->sidi }}</td>
        <td>{{ !$member->sidis ? '-' : $member->sidis->tanggal }}</td>
        <td>{{ !$member->sidis ? '-' : $member->sidis->gereja }}</td>
        <td>{{ $member->families->status }}</td>
        <td>{{ $member->pendidikan }}</td>
        <td>{{ !$member->mondings ? '-' : $member->mondings->monding }}</td>
        <td>{{ !$member->mondings ? '-' : $member->mondings->tanggal }}</td>
      </tr>
    @endforeach
  </tbody>
</table>