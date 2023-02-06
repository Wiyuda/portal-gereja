@extends('layouts.dashboard')
@section('title', 'Admin | Daftar Berita Gereja')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h6 class="fw-bold">Daftar Berita Gereja</h6>
          <a href="{{ route('berita.create') }}" class="btn btn-primary">Tambah Berita</a>
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
                  <th>Judul</th>
                  <th>Thumbnail</th>
                  <th width="11%">Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Thumbnail</th>
                  <th width="11%">Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                @php
                  $i = 1;
                @endphp
                @foreach ($reports as $report)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $report->title }}</td>
                    <td>
                      <img src="{{ url('storage/thumbnail', $report->thumbnail) }}" alt="Thumbnail" width="150px">
                    </td>
                    <td width="15%">
                      <a href="{{ route('berita.edit', $report->id) }}" class="btn btn-success">
                        <i class="fas fa-pen"></i>
                      </a>
                      <a href="{{ route('berita.show', $report->id) }}" class="btn btn-info">
                        <i class="fas fa-info"></i>
                      </a>
                      <form action="{{ route('berita.destroy', $report->id) }}" method="POST" class="d-inline">
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