@extends('layouts.dashboard')
@section('title', 'Admin | Edit Data Warta')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="fw-bold">Edit Data Warta</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" value="{{ $news->tanggal }}" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal">
                @error('tanggal')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-4">
                <label for="minggu">Minggu</label>
                <input type="text" name="minggu" value="{{ $news->minggu }}" class="form-control @error('minggu') is-invalid @enderror" id="minggu">
                @error('minggu')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-4">
                <label for="warta">Warta</label>
                <input type="file" name="warta" value="{{ $news->warta }}" class="form-control @error('warta') is-invalid @enderror" id="warta">
                @error('warta')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              
              <div class="form-group col-md">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" rows="3" class="form-control @error('keterangan') is-invalid @enderror">{{ $news->keterangan }}</textarea>
                @error('keterangan')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary mr-3">Edit Warta</button>
              <a href="{{ route('news.index') }}" class="btn btn-warning">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection