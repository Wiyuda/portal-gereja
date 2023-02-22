@extends('layouts.dashboard')
@section('title', 'Admin | Detail Kawin')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="fw-bold">Detail Kawin</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th>Keluarga</th>
                  <td>{{ $married->families->keluarga }}</td>
                </tr>
                <tr>
                  <th>Anggota Keluarga</th>
                  <td>{{ $married->family_members->nama }}</td>
                </tr>
                <tr>
                  <th>Kawin</th>
                  <td>{{ $married->kawin }}</td>
                </tr>
                <tr>
                  <th>Nama Calon</th>
                  <td>{{ $married->nama_calon }}</td>
                </tr>
                <tr>
                  <th>Asal Gereja Calon</th>
                  <td>{{ $married->asal_gereja_calon }}</td>
                </tr>
                <tr>
                  <th>Tanggal Pemberkatan</th>
                  <td>{{ $married->tanggal }}</td>
                </tr>
                <tr>
                  <th>Gereja Pemberkatan</th>
                  <td>{{ $married->gereja }}</td>
                </tr>
                <tr>
                  <th>Keterangan</th>
                  <td>{{ $married->keterangan }}</td>
                </tr>
              </tbody>
            </table>
            <div class="d-flex justify-content-end">
              <a href="{{ route('kawin') }}" class="btn btn-warning">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection