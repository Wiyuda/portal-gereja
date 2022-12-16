@extends('layouts.dashboard')
@section('title', 'Admin | Data Keluarga')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h6 class="fw-bold">Data Keluarga</h6>
          <a href="{{ route('keluarga.create') }}" class="btn btn-primary">Tambah Keluarga</a>
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
                  <th>No.Registrasi</th>
                  <th>Sektor</th>
                  <th>Keluarga</th>
                  <th width="11%">Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>No.Registrasi</th>
                  <th>Sektor</th>
                  <th>Keluarga</th>
                  <th width="11%">Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                @php
                  $i = 1;
                @endphp
                @foreach ($families as $family)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $family->no_registrasi }}</td>
                    <td>{{$family->sectors->sektor }} / {{$family->sectors->nama }}</td>
                    <td>{{ $family->keluarga }}</td>
                    <td width="11%">
                      <a href="{{ route('keluarga.edit', $family->id) }}" class="btn btn-success">
                        <i class="fas fa-pen"></i>
                      </a>
                      <form action="{{ route('keluarga.destroy', $family->id) }}" method="POST" class="d-inline">
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