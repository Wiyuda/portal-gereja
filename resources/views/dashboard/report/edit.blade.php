@extends('layouts.dashboard')
@section('title', 'Admin | Edit Berita Gereja')

@section('content')
  @push('styles')
    <link rel="stylesheet" href="{{ url('assets/library/summernote/summernote-bs4.min.css') }}">
  @endpush

  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="fw-bold">Edit Berita Gereja</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('berita.update', $report->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="title">Judul</label>
                <input type="text" name="title" value="{{ $report->title }}" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Input judul berita">
                @error('title')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="thumbnail">Thumbnail</label>
                <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail">
                @error('thumbnail')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="news">Berita</label>
                <textarea name="news" id="news" rows="4" class="form-control @error('news') is-invalid @enderror">{{ $report->news }}</textarea>
                @error('news')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary mr-3">Edit Berita</button>
              <a href="{{ route('berita.index') }}" class="btn btn-warning">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @push('scripts')
    <script src="{{ url('assets/library/summernote/summernote-bs4.min.js') }}"></script>
    <script>
      $('#news').summernote({
        placeholder: 'Input berita hari ini',
        height: 200
      });
    </script>
  @endpush
@endsection