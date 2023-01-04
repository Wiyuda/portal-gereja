@extends('layouts.dashboard')
@section('title', 'Admin | Tambah Data Banner')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="fw-bold">Tambah Data Banner</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="form-group col-md-6">
                <label for="image_1" class="form-label">Image 1</label>
                <input type="file" name="image_1" id="image_1" class="form-control @error('image_1') is-invalid @enderror">
                @error('image_1')
                    <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="title_1" >Title 1</label>
                <input type="text" name="title_1" id="title_1" class="form-control @error('title_1') is-invalid @enderror">
                @error('title_1')
                    <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="deskripsi_1">Deskripsi 1</label>
                    <textarea name="deskripsi_1" id="deskripsi_1" rows="3" class="form-control @error('deskripsi_1') is-invalid @enderror"></textarea>
                    @error('deskripsi_1')
                        <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="image_2">Image 2</label>
                <input type="file" name="image_2" id="image_2" class="form-control @error('image_2') is-invalid @enderror">
                @error('image_2')
                    <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="title_2">Title 2</label>
                <input type="text" name="title_2" id="title_2" class="form-control @error('title_2') is-invalid @enderror">
                @error('title_2')
                    <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="deskripsi_2">Deskripsi 2</label>
                    <textarea name="deskripsi_2" id="deskripsi_2" rows="3" class="form-control @error('deskripsi_2') is-invalid @enderror"></textarea>
                    @error('deskripsi_2')
                        <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="image_3">Image 3</label>
                <input type="file" name="image_3" id="image_3" class="form-control @error('image_3') is-invalid @enderror">
                @error('image_3')
                    <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="title_3">Title 3</label>
                <input type="text" name="title_3" id="title_3" class="form-control @error('title_3') is-invalid @enderror">
                @error('title_3')
                    <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="deskripsi_3">Deskripsi 3</label>
                    <textarea name="deskripsi_3" id="deskripsi_3" rows="3" class="form-control @error('deskripsi_3') is-invalid @enderror"></textarea>
                    @error('deskripsi_3')
                        <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
              <label for="status">Status</label>
              <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                @foreach ($statuses as $status)                    
                  <option value="{{ $status }}">{{ $status }}</option>
                @endforeach
              </select>
              @error('status')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
              @enderror
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary mr-3">Tambah Banner</button>
              <a href="{{ route('banner.index') }}" class="btn btn-warning">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection