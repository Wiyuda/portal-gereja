@extends('layouts.dashboard')
@section('title', 'Admin | Data Jemaat Pindah Gereja')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h6 class="fw-bold">Data Jemaat Pindah Gereja</h6>
          <a href="{{ route('pindah.create') }}" class="btn btn-primary">Tambah Jemaat Pindah</a>
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
                  <th>Nama Keluarga</th>
                  <th>Nama</th>
                  <th>Status</th>
                  <th>Tanggal</th>
                  <th>Gereja</th>
                  <th>Keterangan</th>
                  <th width="11%">Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Keluarga</th>
                  <th>Nama</th>
                  <th>Status</th>
                  <th>Tanggal</th>
                  <th>Gereja</th>
                  <th>Keterangan</th>
                  <th width="11%">Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                @php
                  $i = 1;
                @endphp
                @foreach ($shifts as $shift)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $shift->families->keluarga }}</td>
                    <td>{{ $shift->familyMembers->nama }}</td>
                    <td>{{ $shift->status }}</td>
                    <td>{{ $shift->tgl }}</td>
                    <td>{{ $shift->gereja }}</td>
                    <td>{{ $shift->keterangan }}</td>
                    <td width="11%">
                      <a href="{{ route('pindah.edit', $shift->id) }}" class="btn btn-success">
                        <i class="fas fa-pen"></i>
                      </a>
                      <form action="{{ route('pindah.destroy', $shift->id) }}" method="POST" class="d-inline">
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