@extends('layouts.dashboard')
@section('title', 'Admin | Profil Gereja')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="fw-bold">Profil Gereja</h6>
        </div>
        <div class="card-body">
          @if (session('status'))
            <div class="d-flex justify-content-end">
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>
          @endif
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Tahun</th>
                  <th>Pendiri</th>
                  <th>Pendeta Resort</th>
                  <th>Pendeta Jemaat</th>
                  <th width="11%">Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nama</th>
                  <th>Tahun</th>
                  <th>Pendiri</th>
                  <th>Pendeta Resort</th>
                  <th>Pendeta Jemaat</th>
                  <th width="11%">Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                <tr>
                  <td>{{ $profile->nama }}</td>
                  <td>{{ $profile->tahun }}</td>
                  <td>{{ $profile->pendiri }}</td>
                  <td>{{ $profile->pendeta_resort }}</td>
                  <td>{{ $profile->pendeta_jemaat }}</td>
                  <td width="11%">
                    <a href="{{ route('profil.edit', $profile->id) }}" class="btn btn-success">
                      <i class="fas fa-pen"></i>
                    </a>
                    <a href="{{ route('profil.show', $profile->id) }}" class="btn btn-info">
                      <i class="fas fa-eye"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection