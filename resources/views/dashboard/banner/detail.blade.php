@extends('layouts.dashboard')
@section('title', 'Admin | Detail Data Banner')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <div class="h6 fw-bold">Detail Data Banner</div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <tbody>
                <tr>
                  <th>Image 1</th>
                  <td><img src="{{ asset('storage/'. $banner->image_1) }}" alt="Image" width="150"></td>
                </tr>
                <tr>
                  <th>Title 1</th>
                  <td>{{ $banner->title_1 }}</td>
                </tr>
                <tr>
                  <th>Deskripsi 1</th>
                  <td>{{ $banner->deskripsi_1 }}</td>
                </tr>
                <tr>
                <tr>
                  <th>Image 2</th>
                  <td><img src="{{ asset('storage/'. $banner->image_2) }}" alt="Image" width="150"></td>
                </tr>
                <tr>
                  <th>Title 2</th>
                  <td>{{ $banner->title_2 }}</td>
                </tr>
                <tr>
                  <th>Deskripsi 2</th>
                  <td>{{ $banner->deskripsi_2 }}</td>
                </tr>
                <tr>
                <tr>
                  <th>Image 3</th>
                  <td><img src="{{ asset('storage/'. $banner->image_3) }}" alt="Image" width="150"></td>
                </tr>
                <tr>
                  <th>Title 3</th>
                  <td>{{ $banner->title_3 }}</td>
                </tr>
                <tr>
                  <th>Deskripsi 3</th>
                  <td>{{ $banner->deskripsi_3 }}</td>
                </tr>
                <tr>
                  <th>Status</th>
                  <td>{{ $banner->status }}</td>
                </tr>
              </tbody>
            </table>
            <div class="d-flex justify-content-end">
              <a href="{{ route('banner.index') }}" class="btn btn-warning">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection