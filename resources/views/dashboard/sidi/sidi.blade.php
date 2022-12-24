@extends('layouts.dashboard')
@section('title', 'Admin | Data Sidi Jemaat')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
          <div class="h6 fw-bol">Data Sidi Jemaat</div>
          <a href="{{ route('sidi.create') }}" class="btn btn-primary">Tambah Data Sidi</a>
        </div>
        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('status') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Status Sidi</th>
                  <th>Tanggal</th>
                  <th>Gereja</th>
                  <th width="11%">Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Status Sidi</th>
                  <th>Tanggal</th>
                  <th>Gereja</th>
                  <th width="11%">Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                @php
                  $i = 1;
                @endphp
                @foreach ($sidis as $sidi)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $sidi->family_members->nama }}</td>
                    <td>{{ $sidi->sidi }}</td>
                    <td>{{ $sidi->tgl }}</td>
                    <td>{{ $sidi->gereja }}</td>
                    <td width="11%">
                      <a href="{{ route('sidi.edit', $sidi->id) }}" class="btn btn-success">
                        <i class="fas fa-pen"></i>
                      </a>
                      <form action="{{ route('sidi.destroy', $sidi->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection