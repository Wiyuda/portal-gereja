@extends('layouts.dashboard')
@section('title', 'Admin | Detail Data Anggota Keluarga')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <div class="h6 fw-bold">Detail Data Anggota Keluarga</div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <tbody>
                <tr>
                  <th>Keluarga</th>
                  <td>{{ $family->families->keluarga }}</td>
                </tr>
                <tr>
                  <th>Nama</th>
                  <td>{{ $family->nama }}</td>
                </tr>
                <tr>
                  <th>Tanggal Lahir</th>
                  <td>{{ $family->tgl_lahir }}</td>
                </tr>
                <tr>
                  <th>Tempa Lahir</th>
                  <td>{{ $family->tempat_lahir }}</td>
                </tr>
                <tr>
                  <th>Jenis Kelamin</th>
                  <td>{{ $family->jenis_kelamin }}</td>
                </tr>
                <tr>
                  <th>Nomor Handphone</th>
                  <td>{{ $family->no_hp }}</td>
                </tr>
                <tr>
                  <th>Alamat</th>
                  <td>{{ $family->alamat }}</td>
                </tr>
                <tr>
                  <th>Status Keluarga</th>
                  <td>{{ $family->status_keluarga }}</td>
                </tr>
                <tr>
                  <th>Status Anak</th>
                  <td>{{ $family->status_anak }}</td>
                </tr>
                <tr>
                  <th>Pendidikan</th>
                  <td>{{ $family->pendidikan }}</td>
                </tr>
                <tr>
                  <th>Status</th>
                  <td>{{ $family->status }}</td>
                </tr>
              </tbody>
            </table>
            <div class="d-flex justify-content-end">
              <a href="{{ route('member.index') }}" class="btn btn-warning">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection