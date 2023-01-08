@extends('layouts.dashboard')
@section('title', 'Admin | Detail Profil Gereja')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="fw-bold">Detail Profil Gereja</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <td>Nama</td>
                  <td>{{ $profile->nama }}</td>
                </tr>
                <tr>
                  <td>Tahun</td>
                  <td>{{ $profile->tahun }}</td>
                </tr>
                <tr>
                  <td>Pendiri</td>
                  <td>{{ $profile->pendiri }}</td>
                </tr>
                <tr>
                  <td>Pendeta Resort</td>
                  <td>{{ $profile->pendeta_resort }}</td>
                </tr>
                <tr>
                  <td>Pendeta Jemaat</td>
                  <td>{{ $profile->pendeta_jemaat }}</td>
                </tr>
                <tr>
                  <td>Guru Huria</td>
                  <td>{{ $profile->guru_huria }}</td>
                </tr>
                <tr>
                  <td>Sintua</td>
                  <td>{{ $profile->sintua }}</td>
                </tr>
                <tr>
                  <td>Image</td>
                  <td><img src="{{ url('storage/image/', $profile->image) }}" alt="Profile"></td>
                </tr>
              </tbody>
            </table>
            <div class="d-flex justify-content-end">
              <a href="{{ route('profil.index') }}" class="btn btn-warning">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection