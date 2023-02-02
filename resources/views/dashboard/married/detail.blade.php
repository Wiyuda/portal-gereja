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
                  <td>Keluarga</td>
                  <td>{{ $married->families->keluarga }}</td>
                </tr>
                <tr>
                  <td>Anggota Keluarga</td>
                  <td>{{ $married->family_members->nama }}</td>
                </tr>
                <tr>
                  <td>Kawin</td>
                  <td>{{ $married->kawin }}</td>
                </tr>
                <tr>
                  <td>Nama Calon</td>
                  <td>{{ $married->nama_calon }}</td>
                </tr>
                <tr>
                  <td>Asal Gereja Calon</td>
                  <td>{{ $married->asal_gereja_calon }}</td>
                </tr>
                <tr>
                  <td>Tanggal</td>
                  <td>{{ $married->tanggal }}</td>
                </tr>
                <tr>
                  <td>Gereja</td>
                  <td>{{ $married->gereja }}</td>
                </tr>
                <tr>
                  <td>Keterangan</td>
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