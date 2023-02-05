@extends('layouts.dashboard')
@section('title', 'Admin | Detail Baptis')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="fw-bold">Detail Baptis</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th>Keluarga</th>
                  <td>{{ $baptism->families->keluarga }}</td>
                </tr>
                <tr>
                  <th>Anggota Keluarga</th>
                  <td>{{ $baptism->family_members->nama }}</td>
                </tr>
                <tr>
                  <th>Status Baptis</th>
                  <td>{{ $baptism->baptis }}</td>
                </tr>
                  <th>Tanggal</th>
                  <td>{{ $baptism->tanggal }}</td>
                </tr>
                <tr>
                  <th>Gereja</th>
                  <td>{{ $baptism->gereja }}</td>
                </tr>
                <tr>
                  <th>Keterangan</th>
                  <td>{{ $baptism->keterangan }}</td>
                </tr>
              </tbody>
            </table>
            <div class="d-flex justify-content-end">
              <a href="{{ route('baptis.index') }}" class="btn btn-warning">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection