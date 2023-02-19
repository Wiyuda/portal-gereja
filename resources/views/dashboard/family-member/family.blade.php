@extends('layouts.dashboard')
@section('title', 'Admin | Data Anggota Keluarga')

@section('content')
@push('styles')
  <link rel="stylesheet" href="{{ url('assets/library/years/css/style.css') }}">
  <link rel="stylesheet" href="{{ url('assets/library/years/css/yearpicker.css') }}">
@endpush
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
          <div class="h6 fw-bold">Data Anggota Keluarga</div>
          <a href="{{ route('member.create') }}" class="btn btn-primary">Tambah Anggota Keluarga</a>
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
          <div class="d-flex justify-content-end">
            <div class="row">
              <div class="col-md-3">
                <input type="text" class="yearpicker form-control my-0 py-0" value="" />
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Keluarga</th>
                  <th>Nama</th>
                  <th>Tanggal Lahir</th>
                  <th>Tempat Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th width="11%">Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Keluarga</th>
                  <th>Nama</th>
                  <th>Tanggal Lahir</th>
                  <th>Tempat Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th width="16%">Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                @php
                  $i = 1;
                @endphp
                @foreach ($members as $member)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $member->families->keluarga }}</td>
                    <td>{{$member->nama }}</td>
                    <td>{{ $member->tgl_lahir }}</td>
                    <td>{{ $member->tempat_lahir }}</td>
                    <td>{{ $member->jenis_kelamin }}</td>
                    <td width="16%">
                      <a href="{{ route('member.show', $member->id) }}" class="btn btn-info">
                        <i class="fas fa-info-circle"></i>
                      </a>
                      <a href="{{ route('member.edit', $member->id) }}" class="btn btn-success">
                        <i class="fas fa-pen"></i>
                      </a>
                      <form action="{{ route('member.destroy', $member->id) }}" method="POST" class="d-inline">
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
@push('scripts')
  <script src="{{ url('assets/library/years/js/yearpicker.js') }}"></script>
  <script>
    let date = new Date();
    let year = date.getFullYear();
    $(document).ready(function() {
      $(".yearpicker").yearpicker({
        year: year,
        startYear: 2010,
        endYear: 2050
      });
    });
  </script>
@endpush
@endsection