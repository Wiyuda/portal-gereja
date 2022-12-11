@extends('layouts.dashboard')
@section('title', 'Admin | Data Sektor')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h6 class="fw-bold">Data Sektor</h6>
          <a href="{{ route('sektor.create') }}" class="btn btn-primary">Tambah Sektor</a>
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
                  <th>Sektor</th>
                  <th>Nama</th>
                  <th>Keterangan</th>
                  <th width="11%">Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Sektor</th>
                  <th>Nama</th>
                  <th>Keterangan</th>
                  <th width="11%">Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                @php
                  $i = 1;
                @endphp
                @foreach ($sectors as $sector)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $sector->sektor }}</td>
                    <td>{{ $sector->nama }}</td>
                    <td>{{ $sector->keterangan }}</td>
                    <td width="11%">
                      <a href="{{ route('sektor.edit', $sector->id) }}" class="btn btn-success">
                        <i class="fas fa-pen"></i>
                      </a>
                      <form action="{{ route('sektor.destroy', $sector->id) }}" method="POST" class="d-inline">
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