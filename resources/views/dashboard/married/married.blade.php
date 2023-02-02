@extends('layouts.dashboard')
@section('title', 'Admin | Data Kawin')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h6 class="fw-bold">Data Kawin</h6>
          <a href="{{ route('kawin.create') }}" class="btn btn-primary">Tambah Kawin</a>
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
                  <th>Keluarga</th>
                  <th>Anggota Keluarga</th>
                  <th>Kawin</th>
                  <th>Nama Calon</th>
                  <th width="15%">Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Keluarga</th>
                  <th>Anggota Keluarga</th>
                  <th>Kawin</th>
                  <th>Nama Calon</th>
                  <th width="15%">Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                @php
                  $i = 1;
                @endphp
                @foreach ($marrieds as $married)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $married->families->keluarga }}</td>
                    <td>{{ $married->family_members->nama }}</td>
                    <td>{{ $married->kawin }}</td>
                    <td>{{ $married->nama_calon }}</td>
                    <td width="15%">
                      <a href="{{ route('kawin.show', $married->id) }}" class="btn btn-info">
                        <i class="fas fa-eye"></i>
                      </a>
                      <a href="{{ route('kawin.edit', $married->id) }}" class="btn btn-success">
                        <i class="fas fa-pen"></i>
                      </a>
                      <form action="{{ route('kawin.destroy', $married->id) }}" method="POST" class="d-inline">
                        @csrf
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