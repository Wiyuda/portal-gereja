@extends('layouts.dashboard')
@section('title', 'Admin | Data Banner')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h6 class="fw-bold">Data Banner</h6>
          <a href="{{ route('banner.create') }}" class="btn btn-primary">Tambah Banner</a>
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
                  <th>Image 1</th>
                  <th>Title 1</th>
                  <th>Deskripsi 1</th>
                  <th>Status</th>
                  <th width="11%">Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Image 1</th>
                  <th>Title 1</th>
                  <th>Deskripsi 1</th>
                  <th>Status</th>
                    <th width="11%">Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                @php
                  $i = 1;
                @endphp
                @foreach ($banners as $banner)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td><img src="{{ asset('storage/'. $banner->image_1) }}" alt="Image" width="150"></td>
                    <td>{{ $banner->title_1 }}</td>
                    <td>{{ $banner->deskripsi_1 }}</td>
                    <td>{{ $banner->status }}</td>
                    <td width="16%">
                      <a href="{{ route('banner.show', $banner->id) }}" class="btn btn-info">
                        <i class="fas fa-info-circle"></i>
                      </a>
                      <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-success">
                        <i class="fas fa-pen"></i>
                      </a>
                      <form action="{{ route('banner.destroy', $banner->id) }}" method="POST" class="d-inline">
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