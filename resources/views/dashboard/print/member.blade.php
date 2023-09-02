<table>
  <thead>
    <tr class="sector">
      <th>Distrik</th>
      <th>X Medan Aceh</th>
    </tr>
    <tr class="sector">
      <th>Ressort</th>
      <th>Ressort Padang Bulan Medan</th>
    </tr>
    <tr class="sector">
      <th>Huria</th>
      <th>HKBP Persiapan Ressort Bethel Tanjung Selamat</th>
    </tr>
    <tr class="sector">
      <th>Sektor </th>
      <th>{{ $sector }}</th>
    </tr>
    <tr class="header">
      <th>No</th>
      <th>Registrasi</th>
      <th>WIJK</th>
      <th>Keluarga</th>
      <th>Tanggal Kawin</th>
      <th>Alamat</th>
      <th>Nama Anggota</th>
      <th>Jenis Kelamin</th>
      <th>Tanggal Lahir</th>
      <th>Tanggal Baptis</th>
      <th>Tanggal Sidi</th>
      <th>Pendidikan</th>
    </tr>
  </thead>
  <tbody>
    @php
      $i = 1;
    @endphp
    @foreach($families as $family)
      <tr>
        <th>{{ $i++ }}</th>
        <td>{{ $family->no_registrasi }}</td>
        <td>{{ $family->sectors->sektor }}</td>
        <td>{{ $family->keluarga }}</td>
        <table>
          <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          @foreach ($family->familyMembers as $member)
            <tr>
              <td>{{ !$member->marrieds ? '-' : $member->marrieds->tanggal }}</td>
              <td>{{ $family->alamat }}</td>
              <td>{{ $member->nama }}</td>
              <td>{{ $member->jenis_kelamin }}</td>
              <td>{{ $member->tgl_lahir }}</td>
              <td>{{ !$member->baptism ? '-' : $member->baptism->tanggal }}</td>
              <td>{{ !$member->sidis ? '-' : $member->sidis->tanggal }}</td>
              <td>{{ $member->pendidikan }}</td>
            </tr>
          @endforeach
        </table>
      </tr>
    @endforeach
  </tbody>
</table>