@extends('layouts.dashboard')
@section('title', 'Admin | Detail Sidi')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="fw-bold">Detail Sidi</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th>Keluarga</th>
                  <td>{{ $sidi->families->keluarga }}</td>
                </tr>
                <tr>
                  <th>Anggota Keluarga</th>
                  <td>{{ $sidi->family_members->nama }}</td>
                </tr>
                <tr>
                  <th>Status Sidi</th>
                  <td>{{ $sidi->sidi }}</td>
                </tr>
                <tr>
                  <th>Gereja</th>
                  <td>{{ $sidi->gereja }}</td>
                </tr>
                  <th>Tanggal</th>
                  <td>{{ $sidi->tanggal }}</td>
                </tr>
                <tr>
                  <th>Keterangan</th>
                  <td>{{ $sidi->keterangan }}</td>
                </tr>
              </tbody>
            </table>
            <div class="d-flex justify-content-end">
              <a href="{{ route('sidi.index') }}" class="btn btn-warning">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection